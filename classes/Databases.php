<?php
class Databases {

    private static function connect(){
        $filename = 'local.txt';
        if (file_exists($filename)) {
            $ini = parse_ini_file('./include/configLocal.ini.php');
        } else {
            $ini = parse_ini_file('./include/config.ini.php');
        }
    //    $ini = parse_ini_file('./include/config.ini.php');
        $dbName =  $ini['db_name'];
        $dbUser =  $ini['db_user'];
        $dbPass =  $ini['db_password'];
        $host =  $ini['host'];
        $pdo = new PDO("mysql:host=".$host.";dbname=".$dbName.";charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            if($data){
                return $data;
            }
        }
    }
}
?>
