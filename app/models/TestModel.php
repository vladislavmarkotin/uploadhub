<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 26.05.2018
 * Time: 9:27
 */



require_once "core/db/DBClass.php";
require_once "core/db/start.php";
require_once 'vendor/autoload.php';

use DB\DBClass as DB;
use \Illuminate\Database\Eloquent\Model;

class TestModel extends Model{

    protected $table = 'users';
    protected $fillable = ['username','email','password'];

    public function __construct(){

    }

    public function test(){
        TestModel::create(['username'=> "Vlad",'email'=>"vlad@test.com",'password'=>"123456"]);
    }
} 