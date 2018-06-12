<?php

/* login.html */
class __TwigTemplate_e4d339367ece5cf9f3c0b1568e5d3e6d51a1bde92ad9b0c2cf201291624b4579 extends Twig_Template
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
    <title>Log in</title>
</head>
<body>
<h1>Hello, please log in to have an access to the project!</h1>
<form method=\"post\" action=\"log\">
    <p><b>Enter your login:</b></p>
    <input type=\"email\" name=\"login\">
    <p><b>Enter your password:</b></p>
    <input type=\"password\" name=\"pass\">
    <br/>
    <button type=\"submit\">Войти</button>
</form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "login.html", "D:\\OpenServer\\OpenServer\\domains\\uploadhub.com\\app\\views\\templates\\login.html");
    }
}
