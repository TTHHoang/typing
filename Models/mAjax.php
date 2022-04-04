<?php
class mAjax extends mController{
    function __construct() {
        //require_once('views/vAjax.php');
        //$this->views = new vAjax();
    }

    public function getAjax(){
        if($_POST){
            $data = new stdClass();
            $data = json_decode($_POST['data']);
            switch ($data->func) {
                case 'register':
                //var_dump($cont);
                    if(preg_match('/^[a-zA-Z0-9]{0,12}+$/', $data->username)){
                        //check if username exists in database before continue

                        $d = self::query("SELECT * FROM users WHERE username=?", array($data->username));

                        if($d){
                            //foreach does not work yet
                            foreach ($d as $key) {
                                if($data->username == $key['username']){
                                    $data->message = 'Username already taken';
                                    $data->success = false;
                                } else {
                                    $data->success = true;
                                }
                            }
                        } else {
                            if(!empty($data->password)){
                                if(preg_match('/[^\s]+/', $data->password)){
                                    $hashed = password_hash($data->password, PASSWORD_DEFAULT);
                                    $data->password = $hashed;

                                    $insert = $this->register($data);
                                    if($insert->success){
                                        $data->success = true;
                                    }
                                }
                                else {
                                    $data->success = false;
                                    $data->message = 'No spaces allowed';
                                }
                            }
                        }
                    } else {
                        $data->message = 'Wrong characters';
                        $data->success = false;
                    }
                    echo json_encode($data);
                    break;
                case 'login':
                    if(preg_match('/^[a-zA-Z0-9]{0,12}+$/', $data->username)){
                        $d = self::query("SELECT * FROM users WHERE username=?", array($data->username));
                        if($d){
                            foreach ($d as $key) {
                                if(password_verify($data->password, $key['userpass'])){
                                    $_SESSION['user']=$data->username;
                                    $data->success = true;
                                    $data->message = "Password matches";
                                } else {
                                    $data->success = false;
                                    $data->message = "Password does not match";
                                }
                            }
                        } else {
                            $data->success = false;
                            $data->message = "Wrong login details";
                        }
                    }
                    echo json_encode($data);

                    break;
                case 'SaveHighscore':
                    if(preg_match('/^\d+$/', $data->hs)){
                        $name = $_SESSION['user'];
                        $level = $_SESSION['level'];
                        $d = self::query("SELECT * FROM highscore WHERE username=? AND level=?", array($name, $level));
                        if($d){
                            foreach ($d as $key) {
                                if($data->hs <= $key['highscore']){
                                    $data->success = true;
                                    $data->message = "No new highscore";
                                }  else {
                                    $data = self::query("UPDATE highscore SET highscore = ? WHERE username = ? and LEVEL = ? ", array($data->hs, $name, $level));
                                    $data->success = true;
                                    $data->hs = $data->hs;
                                    $data->message = "Highscore updated";
                                }
                            }

                        } else {
                            $data = self::query("INSERT INTO highscore (username, level, highscore) VALUES(?, ?, ?)", array($name, $level,  $data->hs));
                            $data->success = success;
                            $data->message = "Highscore saved";

                        }
                    } else {
                        $data->success = false;
                        $data->message = "Wrong login details";
                    }
                    echo json_encode($data);

                    break;
                default:
                    $data->success = false;
                    $data->message = 'No function found';
                    echo json_encode($data);
                    break;
            }
        } else {
            echo "Access denied";
        }
    }

    public function register($data){
        $d = self::query("INSERT INTO users (username, userpass) VALUES(?, ?)", array($data->username, $data->password));
        $data->success = true;
        return $data;
    }
}

 ?>
