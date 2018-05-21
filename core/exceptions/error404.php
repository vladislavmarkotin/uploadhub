<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 20.05.2018
 * Time: 8:00
 */

class Error404 {

    public function __construct($view){
        $core = core\CoreClass::getInstance();
        $core->init();

        $template = $core->getSystemObject(array(
            "type" => "template"
        ));

        $twig = $template->getTwig();
        echo $twig->render($view);
    }

    public function Error(){
        die();
    }
}