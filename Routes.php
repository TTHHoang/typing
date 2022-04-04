<?php

    Route::set('main', function($route){
        $controller = new cMain($route);
    });
    Route::set('index.php', function(){
        //$controller = new cIndex;
    });
    Route::set('ajax', function(){
        $controller = new cAjax($route);
    });
    Route::set('FirstLevel', function(){
        echo " FirstLevel";
    });
?>
