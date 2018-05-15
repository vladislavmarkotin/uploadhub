<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 05.05.2018
 * Time: 7:18
 */

require_once 'core/CoreClass.php';

$request = array(
    "type" => "template"
);

$core = core\CoreClass::getInstance();
$core->init();
$template = $core->getSystemObject($request);
$twig = $template->getTwig();
//var_dump($twig);
echo $twig->render('index.html');
