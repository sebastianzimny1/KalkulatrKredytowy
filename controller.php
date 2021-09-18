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
              $controller = new app\controllers\HomeController ();
		$controller->generateView ();
	break;
        case 'calcView' :
		// utwórz obiekt i uzyj
		$controller = new app\controllers\CalcCtrl ();
		$controller->generateView ();
        break;
	case 'calcCompute' :

		// utwórz obiekt i uzyj
                $controller = new app\controllers\CalcCtrl ();
		$controller->process ();
	break;

}