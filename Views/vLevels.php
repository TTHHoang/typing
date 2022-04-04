<?php


class vLevels
{

    function __construct()
    {
    }

    function createView(){
        $html = '';
        $html = 'account';
        echo $html;
    }

    function showPermissions($data){
        $html = '';
        foreach ($data as $a) {
            $html .= $a['username'] ." > ". $a['permission'];
            echo $html;
        }
    }


}

?>
