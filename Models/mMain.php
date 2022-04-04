<?php
class mMain extends Controller{
    public $views;
    function __construct() {
        require_once(dirname(__DIR__) .  '/Views/vMain.php');
        $this->views = new vMain();
    }

    public function createView($c){
        $this->views->createView($c);
    }

    public function getHighscore($name){
        //what is the level and highsore of it
        $currentUrl = $_SERVER['REQUEST_URI'];
        if(preg_match('/main$/', $currentUrl)){
            $level = 1;
            $_SESSION['level'] = $level;
        } elseif(preg_match('/main2$/', $currentUrl)){
            $level = 2;
            $_SESSION['level'] = $level;
        } elseif(preg_match('/main3$/', $currentUrl)){
            $level = 3;
            $_SESSION['level'] = $level;
        }
        $d = self::query("SELECT * FROM highscore WHERE username=? AND level=?", array($name, $level));
        $this->views->createHighscore($d);
    }
}

 ?>
