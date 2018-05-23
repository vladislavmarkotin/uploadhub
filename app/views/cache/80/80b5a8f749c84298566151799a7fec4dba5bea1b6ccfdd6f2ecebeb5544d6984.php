<?php

/* signup.html */
class __TwigTemplate_7e3117ebf81b87f00a36f373908fb7f42d8457fc15fc0f37b4ee934eef1cb69f extends Twig_Template
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
    <title>Signing up</title>
</head>
<body>
    <h1>Hello, please sign up to have an access to the project!</h1>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "signup.html";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "signup.html", "D:\\OpenServer\\OpenServer\\domains\\uploadhub.com\\app\\views\\templates\\signup.html");
    }
}
