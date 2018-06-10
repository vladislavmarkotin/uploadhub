<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:04
 */

namespace DB;

require_once 'vendor/autoload.php';
/*spl_autoload_register(function ($class) {
    $class = $class . '.php';
    require_once($class);
});*/

require_once "core/db/Config.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model as Model;

class DBClass extends Model{

    private static $db_instance = null;

    public function __construct() {
        $capsule = new Capsule();
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
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    private function __clone(){}

    public function init(){
         $capsule = new Capsule();
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
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public static function getInstance(){
        if (!self::$db_instance){
            return new DBClass();
        }
        else return self::$db_instance;
    }

    public function Test(){
        echo "Hi, this is DB object!";
    }
} 