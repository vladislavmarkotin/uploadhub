<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:05
 */

namespace Template;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class) {
     if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
    else{
        $class = $class . '.php';
        require_once($class);
    }

});

use core\AbstractCore as AC;
use exceptions\ExceptionClass as Ex;

class TemplateClass extends AC{

    private static $template = null;
    private $loader = null;
    private $twig = null;

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
        $this->loader = new \Twig_Loader_Filesystem('app/views/templates');
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => 'app/views/cache',
            'auto_reload' => true
        ));
    }

    public function getTwig(){
        if ($this->twig)
            return $this->twig;
        else throw new Ex("Error with template");
    }

} 