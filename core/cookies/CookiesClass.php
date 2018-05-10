<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:02
 */

namespace Cookies;

spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});

use core\AbstractCore as AC;

class CookiesClass extends AC{

    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if (!self::$instance){
            return new CookiesClass();
        }
        else{
            return self::$instance;
        }
    }

    public function init(){
        echo "Cookie! ";
    }

} 