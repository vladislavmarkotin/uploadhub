<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 10.06.2018
 * Time: 7:08
 */

namespace Models;

use \Illuminate\Database\Eloquent\Model;

class UserModel extends Model{

    protected $table = 'users';
    protected $fillable = ['username','email','password'];
} 