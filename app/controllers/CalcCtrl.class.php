<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->op = getFromRequest('op');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano liczby 2');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->x = floatval($this->form->x);
			$this->form->y = intval($this->form->y);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			switch ($this->form->op) {
                            case '1%' :                
                                    $this->result->result = ($this->form->x / $this->form->y)+($this->form->x / $this->form->y) * 0.01;
                                    $this->result->result=round($this->result->result,2);
                                    break;
                            case '2%' :
                                    $this->result->result = ($this->form->x / $this->form->y)+($this->form->x / $this->form->y) * 0.02;
                                    $this->result->result = round($this->result->result,2);
                                    break;
                            case '3%' :
                                    $this->result->result = ($this->form->x / $this->form->y)+($this->form->x / $this->form->y) * 0.03;
                                    $this->result->result = round($this->result->result,2);
                                    break;
                            case '5%' :
                                    $this->result->result = ($this->form->x / $this->form->y)+($this->form->x / $this->form->y) * 0.05;
                                    $this->result->result = round($this->result->result,2);
                                    break;
                            case '10%' :
                                    $this->result->result = ($this->form->x / $this->form->y)+($this->form->x / $this->form->y) * 0.10;
                                    $this->result->result = round($this->result->result,2);
                                    break;    
                            default :
                                    $this->result->result = ($this->form->x / $this->form->y)+($this->form->x / $this->form->y) * 0.01;
                                    $this->result->result = round($this->result->result,2);
                                    break;
                        }
			
			getMessages()->addInfo('Wykonano obliczenia.');
                        
                        try{
                            $database = new \Medoo\Medoo([

                                'type' => 'mysql',
                                'host' => 'localhost',
                                'database' => 'KalkulatorKredytowy',
                                'username' => 'root',
                                'password' => '',

                                'charset' => 'utf8',
                                'collation' => 'utf8_polish_ci',
                                'port' => 3306,

                                'option' => [
                                        \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
                                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                                ],

                            ]);
                            /**
                            * ustwiaenia bazy danych
                            */
                            $database->insert("obliczenia", [
                                "kwota" => $this->form->x,
                                "okres_splaty" => $this->form->y,
                                "procent" => $this->form->op,
                                "rata" => $this->result->result,
                                "data" => date("Y-m-d H:i:s")
                                ]);
                        } catch (\PDOException $ex) {
                            getMessages()->addError("DB Error: ".$ex->getMessage());
                        }
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		$this->generateView();
	}
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
                getSmarty()->assign('user',unserialize($_SESSION['user']));
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);		
		getSmarty()->display('calc_credit_view.tpl');
	}
}
	

