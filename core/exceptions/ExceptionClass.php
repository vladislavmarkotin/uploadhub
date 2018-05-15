<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:11
 */

namespace Exceptions;


class ExceptionClass extends \Exception{

    public function __construct($with = null){
        die("Error has happend: ".$with);
    }
} 