<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 08.06.2018
 * Time: 13:27
 */

namespace app\controllers\validator;

spl_autoload_register(function ($class) {

    if( strpos($class, "Exce") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    elseif ( strpos($class, "Request" )){
        $class = str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    elseif (strpos($class, "Main" )){
        $class = str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use \app\controllers\Request\RequestClass as Request;
use MainTemplate as Mtem;

class TextValidator {

    private $value = null;
    private $pattern = null;
    private $main_template = null;

    private function CheckData($value, $pattern = 0, $params = 0){

        //$this->main_template = new Mtem();
        if($value && $pattern){
            $this->name = $value;
            $this->pattern = $pattern;

            if ($params){
                $this->array_of_params = $params;
                //print_r($this->array_of_params);
            }

            //$result = $this->Check($this->pattern); //проверяю паттерн на соответствие правилам

            //print_r("Pattern:".$result); //Результат проверки паттерна. All right

            /*if($result){
                $checkname = $this->CheckName($this->name, $this->pattern);//здесь я проверяю валидность введенного имени
                //var_dump($checkname);
                return $checkname;
            }*/
            return 0;
        }

        return 0;
    }

    public function __construct(array $settings, Request $param){
        $this->value = $param->getElement('test');
        $this->pattern = $settings['pattern'];
        $this->CheckData($this->value, $this->pattern);
        print_r($settings);
    }
} 