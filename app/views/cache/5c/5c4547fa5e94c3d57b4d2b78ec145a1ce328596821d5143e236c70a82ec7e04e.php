<?php

/* 404.html */
class __TwigTemplate_70f0cd472c08363cd9d17ac90116e82b600314a25b7527c1b8b544dde6120e13 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <title>Сожалеем, но такой страницы не существует</title>
</head>
<body>
    <center><h3>Сожалеем, но такой страницы не существует!</h3></center>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "404.html";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "404.html", "D:\\OpenServer\\OpenServer\\domains\\uploadhub.com\\app\\views\\templates\\404.html");
    }
}
