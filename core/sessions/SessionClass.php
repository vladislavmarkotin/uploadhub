<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:05
 */

namespace Sessions;

spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});

use core\AbstractCore as AC;

class SessionClass extends AC{

    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if (!self::$instance){
            return new SessionClass();
        }
        else{
            return self::$instance;
        }
    }

    public function init(){
        session_start();
    }

    public function AddSession($user){
        $_SESSION["user"] = $user;
    }

    public function DeleteSession(){
        $_SESSION = array();

        /*if(session_id() != "" || isset($_COOKIE[session_name()])){

        }*/
        session_destroy();
    }

    public function CheckSession(){
        if (!empty($_SESSION)){

        }
        else{
            echo "Sessions is empty!";
        }
    }
} 