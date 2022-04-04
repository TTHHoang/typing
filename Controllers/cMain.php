<?php
class cMain extends Controller{
    public $model;
    function __construct() {
        require_once('Models/mMain.php');
        $this->model = new mMain();
    }

    public static function createView($c){
        $this->model->CreateView($c);
    }
}
 ?>
