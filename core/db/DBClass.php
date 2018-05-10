<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:04
 */

namespace DB;

spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});

use core\AbstractCore as AC;

class DBClass extends AC{

    private static $db_instance = null;

    private function __construct(){}

    private function __clone(){}

    public function init(){
        echo "DB! ";
    }

    public function getInstance(){
        if (!self::$db_instance){
            return new DBClass();
        }
        else return self::$db_instance;
    }
} 