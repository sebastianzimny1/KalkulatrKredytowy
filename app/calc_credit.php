<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$operation){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;	
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
function validate(&$x,&$y,&$operation,&$messages){
        if ( ! (isset($x) && isset($y) && isset($operation))) {
                //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                return false;
        }

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ( $x == "") {
            $messages [] = 'Nie podano kwoty';
        }
        if ( $y == "") {
            $messages [] = 'Nie podano długości spłaty';
        }

        //nie ma sensu walidować dalej gdy brak parametrów
        if (count ( $messages ) != 0) return false;

        // sprawdzenie, czy $x i $y są liczbami całkowitymi
        if (! is_numeric( $x )) {
            $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
        }

        if (! is_numeric( $y )) {
            $messages [] = 'Druga wartość nie jest liczbą całkowitą';
        }	
            
        if (count ( $messages ) != 0) return false;
	else return true;
}

// 3. wykonaj zadanie jeśli wszystko w porządku
function process(&$x,&$y,&$operation,&$messages,&$result){
    global $role;
	
	//konwersja parametrów na int
	$x = floatval($x);
	$y = intval($y);
	
	//wykonanie operacji
	switch ($operation) {
		case '1%' :
                    if ($role == 'admin'){
			$result = ($x/$y)+($x/$y)*0.01;
                        $result = round($result,2);
                    }else {
				$messages [] = 'Tylko administrator może wybrać 1% !';
			}
			break;
		case '2%' :
			$result = ($x/$y)+($x/$y)*0.02;
                        $result = round($result,2);
			break;
		case '3%' :
			$result = ($x/$y)+($x/$y)*0.03;
                        $result = round($result,2);
			break;
                case '5%' :
			$result = ($x/$y)+($x/$y)*0.05;
                        $result = round($result,2);
			break;
                case '10%' :
			$result = ($x/$y)+($x/$y)*0.10;
                        $result = round($result,2);
			break;    
		default :
			$result = ($x/$y)+($x/$y)*0.01;
                        $result = round($result,2);
			break;
	}
}


//definicja zmiennych kontrolera
$x = null;
$y = null;
$operation = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($x,$y,$operation);
if ( validate($x,$y,$operation,$messages) ) { // gdy brak błędów
	process($x,$y,$operation,$messages,$result);
}
// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_credit_view.php';