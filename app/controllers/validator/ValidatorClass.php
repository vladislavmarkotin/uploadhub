<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 30.05.2018
 * Time: 13:42
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
    elseif ( strpos($class, "Email" )){
        $class = "app/controllers/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use app\controllers\validator\EmailValidator as EmailValidator;
use \app\controllers\Request\RequestClass as Request;

class ValidatorClass {

    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if( !self::$instance){
            self::$instance = new ValidatorClass();
        }
        return self::$instance;
    }

    public function CreateFactory(array $settings = null, Request $params = null)
    {
        /*
         * Тут нужна фабрика,которая бы определяла тип валидатора*/
        print_r($params->getData());
        new EmailValidator($settings['login'], $params);
    }
} 