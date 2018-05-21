<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 19.05.2018
 * Time: 7:58
 */

namespace web_routes;

spl_autoload_register(function($class){
    if( strpos($class, "Ex") ){
        $class = "core/".str_replace('\\', '/', $class) . '.php';
        require_once($class);
    }
});

use exceptions\ExceptionClass as Ex;

class web_routes {

    private static $routes = [
        '' => array(
            'route' => '/',
            'file' => 'app/controllers/indexController.php',
            'class' => 'indexController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => 'index.html',
        ),
        "404" => array (
            'route' => '/',
            'file' => 'core/exceptions/error404.php',
            'class' => 'Error404',
            'function' => 'Error',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => '404.html',
        ),
    ];

    public static function FindRoute($route){
        try {
            foreach (self::$routes as $k => $v){
                if ($k == $route[1]){
                    return $v;
                }
            }
        } catch (Ex $e){
        }

        return 0;
    }
} 