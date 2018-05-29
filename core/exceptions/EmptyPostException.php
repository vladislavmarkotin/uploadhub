<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 29.05.2018
 * Time: 14:13
 */

namespace Exceptions;

class EmptyPostException extends \Exception{

    public function __construct($with = null){
        header("Location:/");
        //die();
    }
}


