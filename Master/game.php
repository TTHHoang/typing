<?php
require_once('Controllers/Controller.php');
$controller = new Controller($cat);
?>
<?php require_once('highscore.php'); ?>

<?php $controller->callFunction('createView', $currentLevel) ?>
