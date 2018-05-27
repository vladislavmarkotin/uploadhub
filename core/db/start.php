<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 27.05.2018
 * Time: 8:01
 */

require 'Config.php';
require 'vendor/autoload.php';
require_once 'core/db/DBClass.php';
use DB\DBClass as DB;
//Initialize Illuminate Database Connection
DB::getInstance();