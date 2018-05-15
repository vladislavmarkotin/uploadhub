<?php

/* index.html */
class __TwigTemplate_5b29f56e901421b1b0509239f28ff8e9b43c54bf4b91c2c5220a2417b26d2eb3 extends Twig_Template
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
    <title>UploadHub - ваше файлохранилище!</title>
</head>
<body>
    <h1>Hello!</h1>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "D:\\OpenServer\\OpenServer\\domains\\uploadhub.com\\app\\views\\templates\\index.html");
    }
}
