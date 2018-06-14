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
    elseif ( strpos($class, "Request" )){
        $class = str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    elseif ( strpos($class, "Models" ) ){
        $class = "app/models/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

require_once "app/models/Models/UserModel.php";
//require_once 'core/CoreClass.php';

use router\RouterClass as router;
use db\DBClass as DB;
use cookies\CookiesClass as Cookie;
use sessions\SessionClass as Session;
use template\TemplateClass as Template;
use exceptions\ExceptionClass as Ex;
use \app\controllers\Request\RequestClass as Request;
use Models\UserModel as UM;

class LoginController {

    private static function getUser($email, $password){
        $user = UM::all()->where("email", $email)->where("password", $password)->toArray();
        //print_r($user);
        return $user;
    }

    public function __construct($view = null){
        if($view){
            $core = core\CoreClass::getInstance();
            $core->init();

            $template = $core->getSystemObject(array(
                "type" => "template"
            ));

            $twig = $template->getTwig();
            echo $twig->render($view);
        }

    }

    public function Login(){

    }

    public function LoginPost(Request $params, $redirect = null){

        $login = $params->getElement('login');
        $password = $params->getElement('pass');

        $data = self::getUser($login, $password);
        //var_dump($data[1]['id']);

        if ( $data ){

          /*
          * Получили ядро проекта
          * Получили системный объект сессий
          */
            $core = core\CoreClass::getInstance();
            $session = $core->getSystemObject(array(
                "type" => "session"
            ));


            /*
             * Здесь надо начинать сессию
             * И мне необходимо послать запрос к $system_objects
             * чтобы получить экземпляр класса сессии
             */
            $session->AddSession($data[1]['id']);
        }



        header("Location: $redirect");
    }

} 