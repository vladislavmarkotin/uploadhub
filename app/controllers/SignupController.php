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
    elseif ( strpos($class, "Request" )){
        $class = str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    elseif ( strpos($class, "Validator" )){
        $class = "app/controllers/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else if ( strpos($class, "Model" ) ){
        $class = "app/models/".str_replace('\\', '/', $class) . '.php';
        //require_once($class);
        die($class);
    }
});

require_once "app/models/Models/UserModel.php";

use router\RouterClass as router;
use db\DBClass as DB;
use cookies\CookiesClass as Cookie;
use sessions\SessionClass as Session;
use exceptions\ExceptionClass as Ex;
use \app\controllers\Request\RequestClass as Request;
use \app\controllers\validator\ValidatorClass as Validator;
use Models\UserModel;

class SignupController {

    private static function create_user($username, $email, $password){
        $user = Models\UserModel::create(['username'=>$username,'email'=>$email,'password'=>$password]);
        return $user;
    }

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

    public function SignPost(Request $params, $redirect = null){

        //var_dump($params->getElement('login'));
        $login = $params->getElement('login');
        $test = $params->getElement('test');
        /*$validator = Validator::getInstance();

        $settings = [
            'login' => [
                'type' => "email",
            ],
            "test" => [
                'type' => "string",
                'pattern' => "r;min:5;max:20"
            ]
        ];

        $validator->CreateFactory($settings, $params);*/

        $args = array(
            'login' => FILTER_VALIDATE_EMAIL,
            'test' => FILTER_VALIDATE_BOOLEAN
        );

        self::create_user($test, $login, $test);
        header("Location: $redirect");

        //var_dump(filter_input_array(INPUT_POST, $args));
    }

} 