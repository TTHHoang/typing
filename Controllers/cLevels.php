<?php

class cLevels extends Controller{
    public $model;
    function __construct() {
        require_once('Models/mLevels.php');
        $this->model = new mLevels();
    }

    public function createView(){
        $this->model->CreateView();
    }
}
 ?>
