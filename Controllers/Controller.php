<?php
class Controller extends Databases{
    public $model;
    function __construct($page){
        require_once("Models/mController.php");
        $this->model = new mController($page);
    }

    public function callFunction($func, $data){
        $this->model->callFunction($func, $data);
    }
}

 ?>
