<?php
session_start();

function load($class_name){
    if(file_exists('./classes/'.$class_name.'.php')){
        require_once './classes/'.$class_name.'.php';
    } else if(file_exists('./Controllers/'.$class_name.'.php')){
        require_once './Controllers/'.$class_name.'.php';
    }
}

spl_autoload_register('load');

require_once('Routes.php');
require_once('classes/Databases.php');
// function __autoload($class_name){
//     if(file_exists('./classes/'.$class_name.'.php')){
//         require_once './classes/'.$class_name.'.php';
//     } else if(file_exists('./Controllers/'.$class_name.'.php')){
//         require_once './Controllers/'.$class_name.'.php';
//     }
// }

//get full url
$cat = $_GET['url'];
$pages = array('main', 'main2', 'index.php', 'ajax');

if($_SERVER['QUERY_STRING']){
    //var_dump($_SERVER['QUERY_STRING']);
    $url = $_SERVER['QUERY_STRING'];
    $string = substr($url, strpos($url, "&=") + 2);

    if($string == 'ajax'){
        $cat = 'ajax';
    } else if ($string == 'logout'){
        session_destroy();
        $cat = 'index.php';
        header("location: index.php");
        exit();
    }
}
if(in_array($cat, $pages)){
    if($cat == 'main'){
        $wordList = array('fries', 'burger', 'nuggets', 'mcdo', 'milkshake', 'coke', 'pickles', 'patty', 'sauce', 'meat', 'potato', 'beef', 'ketchup', 'grilled', 'toasted');
    } else if($cat == 'main2'){
        $wordList = array('cupcake', 'icecream', 'lollipop', 'candy', 'jawbreaker', 'brownies', 'pancakes', 'maplesyrup', 'churros', 'cake', 'cream', 'chocolate', 'vanilla');
    }
    switch ($cat) {
        case 'main2':
            $cat = 'main';
            $currentLevel = 2;
            require_once('Master/master.php');
            require_once('Master/game.php');
            $cont = new Controller($cat);
            break;
        case 'main':
            $cat = 'main';
            $currentLevel = 1;
            require_once('Master/master.php');
            require_once('Master/game.php');
            $cont = new Controller($cat);
            break;
        case 'index.php':
            require_once('Master/master.php');
            $cat = 'levels';
            require_once('Master/levels.php');
            $cont = new Controller($cat);
            break;
        case 'ajax':
            $cat = 'ajax';
            //require_once('Master/levels.php');
            $cont = new Controller($cat);
            $cont->callFunction('getAjax', '');
            break;
        default:
            // code...
            break;
    } if($cat != 'ajax'){
        $html = '';
        $html .= '<script type="text/javascript">
            var words ='.json_encode($wordList).'
        </script>';
        echo $html;
    }
} else {
    echo "dead";
    die();
}

?>
