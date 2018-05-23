<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 23.05.2018
 * Time: 14:26
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
});

use router\RouterClass as router;
use db\DBClass as DB;
use cookies\CookiesClass as Cookie;
use sessions\SessionClass as Session;
use template\TemplateClass as Template;
use exceptions\ExceptionClass as Ex;

class LoginController {

    public function __construct($view){
        $core = core\CoreClass::getInstance();
        $core->init();

        $template = $core->getSystemObject(array(
            "type" => "template"
        ));

        $twig = $template->getTwig();
        echo $twig->render($view);
    }

    public function Login(){
        echo "Log in!!";
    }

} 