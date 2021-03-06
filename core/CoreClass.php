<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.05.2018
 * Time: 12:48
 */

namespace core;

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
    else if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use router\RouterClass as router;
use db\DBClass as DB;
use cookies\CookiesClass as Cookie;
use sessions\SessionClass as Session;
use template\TemplateClass as Template;
use exceptions\ExceptionClass as Ex;

class CoreClass {

    private $system_objects = [];
    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if (!CoreClass::$instance){
            return CoreClass::$instance = new CoreClass();
        }
        else
            return CoreClass::$instance;
    }

    public function init(){

        if (empty($this->system_objects)){
            $this->system_objects["router"] = router::getInstance();
            $this->system_objects["session"] = Session::getInstance();
            $this->system_objects["db"] = DB::getInstance();
            $this->system_objects["template"] = Template::getInstance();
            $this->system_objects["cookies"] = Cookie::getInstance();
        }

        foreach ($this->system_objects as $obj){
            $obj->init();
        }
    }

    public function getSystemObject(array $request){
        switch ($request["type"]){
            case "db": return $this->system_objects['db'];
            case "router": return $this->system_objects['router'];
            case "template": return $this->system_objects['template'];
            case "session": return $this->system_objects['session'];
            case "cookies": return $this->system_objects['cookies'];
            default: throw new Ex("Can`t find such system object!");

        }
    }
} 