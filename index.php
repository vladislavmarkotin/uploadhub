<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 05.05.2018
 * Time: 7:18
 */

require_once 'core/CoreClass.php';
require_once 'core/sessions/SessionClass.php';

$core = core\CoreClass::getInstance();
$core->init();
$router = $core->getSystemObject(array(
    "type" => "router",
));

$router->FindPath();

$session = $core->getSystemObject(array(
   "type" => "session"
));

//$session->CheckSession();