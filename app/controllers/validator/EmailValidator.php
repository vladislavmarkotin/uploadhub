<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 30.05.2018
 * Time: 14:16
 */

namespace app\controllers\validator;

spl_autoload_register(function ($class) {

    if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    elseif ( strpos($class, "Request" )){
        $class = str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use \app\controllers\Request\RequestClass as Request;

class EmailValidator {

    private $email = null;

    public function __construct(array $settings, Request $param){
        print_r($param->getElement('login'));
    }
} 