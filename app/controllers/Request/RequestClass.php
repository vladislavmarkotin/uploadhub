<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 29.05.2018
 * Time: 12:59
 */

namespace app\controllers\Request;


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

} 