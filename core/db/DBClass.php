<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:04
 */

namespace DB;

require_once 'vendor/autoload.php';
spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});

use core\AbstractCore as AC;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBClass extends AC{

    private static $db_instance = null;

    private function __construct(){}

    private function __clone(){}

    public function init(){
         $capsule = new Capsule;
         $capsule->addConnection([
         'driver' => DBDRIVER,
         'host' => DBHOST,
         'database' => DBNAME,
         'username' => DBUSER,
         'password' => DBPASS,
         'charset' => 'utf8',
         'collation' => 'utf8_unicode_ci',
         'prefix' => '',
        ]);
        // Setup the Eloquent ORM…
        $capsule->bootEloquent();
    }

    public function getInstance(){
        if (!self::$db_instance){
            return new DBClass();
        }
        else return self::$db_instance;
    }

    public function Test(){
        echo "Hi, this is DB object!";
    }
} 