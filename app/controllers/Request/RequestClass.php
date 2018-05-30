<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 29.05.2018
 * Time: 12:59
 */

namespace app\controllers\Request;

spl_autoload_register(function($class){
    if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use exceptions\ExceptionClass as Ex;

class RequestClass {

    private $data = [];

    public function setData(array $arr){

        foreach ($arr as $k => $v){
            $this->data[$k] = $v;
        }
    }

    public function getData(){
        return $this->data;
    }

    public function getElement($in){
        if (isset($this->data[$in]) )
            return $this->data[$in];
        throw new Ex("Такой элемент не передавался через POST");
    }

} 