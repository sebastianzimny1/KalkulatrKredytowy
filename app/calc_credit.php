<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$operation = $_REQUEST ['op'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($x) && isset($y) && isset($operation))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano długości spłaty';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$x = floatval($x);
	$y = intval($y);
	
	//wykonanie operacji
	switch ($operation) {
		case '1%' :
			$result = ($x/$y)+($x/$y)*0.01;
                        $result = round($result,2);
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

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_credit_view.php';