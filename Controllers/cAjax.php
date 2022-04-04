<?php

class cAjax extends Controller{
    public $model;
    function __construct() {
        require_once('Models/mAjax.php');
        $this->model = new mAjax();
    }

    public function getAjax(){
        $this->model->getAjax();
    }
}
 ?>
