<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:05
 */

namespace Template;

spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});

use core\AbstractCore as AC;

class TemplateClass extends AC{

    private static $template = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if (!self::$template){
            return new TemplateClass();
        }
        else{
            return self::$template;
        }
    }

    public function init(){
        echo "Template! ";
    }

} 