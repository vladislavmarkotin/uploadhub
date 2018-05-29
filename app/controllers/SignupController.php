<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 23.05.2018
 * Time: 13:53
 */

spl_autoload_register(function ($class) {
    if (strpos($class, "Router")){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if( strpos($class, "Session") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if( strpos($class, "DB") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if( strpos($class, "Cookies") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if( strpos($class, "Template") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if( strpos($class, "Core") ){
        $class = "core/".$class . '.php';
        require_once($class);
    }
    else if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if (strpos($class, "Manager")){
        $class = "app/controllers/Abstract_factory_for_validator".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use router\RouterClass as router;
use db\DBClass as DB;
use cookies\CookiesClass as Cookie;
use sessions\SessionClass as Session;
use exceptions\ExceptionClass as Ex;

class SignupController {

    public function __construct($view = null){
        if ($view){
            $core = core\CoreClass::getInstance();
            $core->init();

            $template = $core->getSystemObject(array(
                "type" => "template"
            ));

            $twig = $template->getTwig();
            echo $twig->render($view);
        }

    }

    public function Signup(){
        echo "Sign up!";
    }

    public function SignPost($params){
        echo "hi";
        var_dump($params);
    }

} 