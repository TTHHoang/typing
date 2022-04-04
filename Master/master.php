<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing game</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
        integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Open+Sans|Lora&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
    //require_once('game.php');
    if(preg_match("/\index.php/", $cat, $match)){
        echo '<script type="text/javascript" src="js/login.js"></script>';
    } else if($currentLevel == 1){
        echo '<script type="text/javascript" src="js/main.js"></script>';
    } else if($currentLevel == 2){
        echo '<script type="text/javascript" src="js/main2.js"></script>';
    } else if($currentLevel == 3){
        echo '<script type="text/javascript" src="js/main3.js"></script>';
    }
     ?>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/all.js"></script>

</body>

</html>