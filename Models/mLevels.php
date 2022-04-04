<?php
class mLevels extends mController{
    public $views;
    function __construct() {
    require_once(dirname(__DIR__) .  '/Views/vLevels.php');
        $this->views = new vLevels();
    }

    public function createView(){
        $this->views->createView();
    }

    public function getPermissions(){
        $data = self::query("SELECT * FROM users");
        $this->views->showPermissions($data);
    }
}

 ?>
