<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.05.2018
 * Time: 12:49
 */

namespace router;

spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});

use core\AbstractCore as AC;

class RouterClass extends AC{

    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if ( !self::$instance ){
            return new RouterClass();
        }
        else return self::$instance;
    }

    public function init(){
        echo "Route! ";
    }
} 