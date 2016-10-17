<?php

/* @Twig/Exception/exception.json.twig */
class __TwigTemplate_775b4e755e6d64c20e3e1309da502db6b068b379fe389bb8b07568cee88ad045 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b841a33d5043e9e63af2bac26993a61aaf7bc978436a07ed986bcbef71dfd66f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b841a33d5043e9e63af2bac26993a61aaf7bc978436a07ed986bcbef71dfd66f->enter($__internal_b841a33d5043e9e63af2bac26993a61aaf7bc978436a07ed986bcbef71dfd66f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_b841a33d5043e9e63af2bac26993a61aaf7bc978436a07ed986bcbef71dfd66f->leave($__internal_b841a33d5043e9e63af2bac26993a61aaf7bc978436a07ed986bcbef71dfd66f_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    public function getSource()
    {
        return "{{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}
";
    }
}
