<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';

class HomeController{

    public function generateView()
       {
            global $conf;
            $smarty = new Smarty();
            $smarty->assign('conf',$conf);

            $smarty->display($conf->root_path.'/app/home/Home_view.tpl');
       }

}