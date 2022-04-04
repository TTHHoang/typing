<?php
require_once('Controllers/Controller.php');
$controller = new Controller($cat);
?>
<?php
//check is session exists
if(isset($_SESSION['user'])){
    $controller->callFunction('getHighscore', $_SESSION['user']);
}


?>
