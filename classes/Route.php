<?php
class Route {
    public static $validRoutes = [];
    public static function set($route, $function){
        self::$validRoutes[]=$route;
        //print_r(self::$validRoutes);

        if($_GET['url'] == $route){
            $function->__invoke($route);
        }
    }
}
?>
