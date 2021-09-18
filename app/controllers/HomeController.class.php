<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.
namespace app\controllers;
class HomeController{

    public function generateView()
       {
            getSmarty()->display('Home_view.tpl');
       }

}