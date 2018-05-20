<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.05.2018
 * Time: 12:49
 */

namespace router;

spl_autoload_register(function ($class){
    if ( strpos($class, "Abstract") ) {
        $class = $class . '.php';
        require_once($class);
    }
    elseif (strpos($class, "web")){
        /*$class = "core/router/".str_replace('\\', '/', $class) . '.php';
        require_once($class);*/
    }
    else if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }

});

require_once 'core/router/web_routes/web_routes.php';

use core\AbstractCore as AC;
use web_routes\web_routes;
use exceptions\ExceptionClass as Ex;


class RouterClass extends AC{

    private static $instance = null;
    private $path = null;
    private $file_info = null;

    private function __construct(){}

    private function __clone(){}

    private function CheckFile($param){
        if (!file_exists($param['file'])){
            echo $param['file'];
            throw new Ex();
        }
        require_once $param['file'];
    }

    private function CheckClass($param){
        if (!class_exists($param['class']) ){
            echo $param['class'];
            throw new Ex();
        }
        return new $param['class'];
    }

    public static function getInstance(){
        if ( !self::$instance ){
            return new RouterClass();
        }
        else return self::$instance;
    }

    public function init(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $this->path = $routes;
    }

    public function FindPath(){
        $this->file_info = web_routes::FindRoute($this->path);
        $this->CheckFile($this->file_info);
        $obj = $this->CheckClass($this->file_info);
        if (!$this->file_info){
            //header("Location: core/exceptions/error404.php");
        }
    }
} 