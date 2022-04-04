<?php
class mController extends Databases{
    public $model;
    function __construct($page){
        $p = ucfirst($page);
        require_once("m".$p.".php");
        require_once("Controllers/c".$p.".php");
        $className = 'm'.$p;
        $this->model = new $className;
    }

    public function callFunction($func, $data){
        $this->model->$func($data);
    }
}
 ?>
