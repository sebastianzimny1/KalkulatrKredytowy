<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

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
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
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
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);		
		getSmarty()->display('calc_credit_view.tpl');
	}
}
