<?php
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
// - w tym wypadku jest już tylko jeden punkt wejścia do aplikacji - skrypt ctrl.php
require_once 'init.php';

//2. wykonanie akcji
switch ($action) {
	default : // 'strona domowa'
	    // załaduj definicję kontrolera
                include_once 'app/controllers/HomeController.class.php';
                $controller = new HomeController ();
		$controller->generateView ();
	break;
        case 'calcView' :
                include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$controller = new CalcCtrl ();
		$controller->generateView ();
        break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$controller = new CalcCtrl ();
		$controller->process ();
	break;

}