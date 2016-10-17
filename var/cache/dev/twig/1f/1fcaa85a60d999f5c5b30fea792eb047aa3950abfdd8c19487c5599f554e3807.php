<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_102ee933de271c4e2920a622a14ad2e295523e8554ada380b9ca9aab25822f0b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_646fb539b19847f893e7eb50dc34b16f07cc9de10d76ee3fa9e6d401f10507a6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_646fb539b19847f893e7eb50dc34b16f07cc9de10d76ee3fa9e6d401f10507a6->enter($__internal_646fb539b19847f893e7eb50dc34b16f07cc9de10d76ee3fa9e6d401f10507a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_646fb539b19847f893e7eb50dc34b16f07cc9de10d76ee3fa9e6d401f10507a6->leave($__internal_646fb539b19847f893e7eb50dc34b16f07cc9de10d76ee3fa9e6d401f10507a6_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_9f77be01e6a8b204061a226af49028747592be62422a82ff167b55fde021dd4c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9f77be01e6a8b204061a226af49028747592be62422a82ff167b55fde021dd4c->enter($__internal_9f77be01e6a8b204061a226af49028747592be62422a82ff167b55fde021dd4c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_9f77be01e6a8b204061a226af49028747592be62422a82ff167b55fde021dd4c->leave($__internal_9f77be01e6a8b204061a226af49028747592be62422a82ff167b55fde021dd4c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d41d3d4a5f3fd5e2c247023d712a821c718b8809f58183210465461e9e00f78c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d41d3d4a5f3fd5e2c247023d712a821c718b8809f58183210465461e9e00f78c->enter($__internal_d41d3d4a5f3fd5e2c247023d712a821c718b8809f58183210465461e9e00f78c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d41d3d4a5f3fd5e2c247023d712a821c718b8809f58183210465461e9e00f78c->leave($__internal_d41d3d4a5f3fd5e2c247023d712a821c718b8809f58183210465461e9e00f78c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_d4e36e539bf21951c742b548f76be41d9d5261410fc6b8739768c57b189e3e49 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d4e36e539bf21951c742b548f76be41d9d5261410fc6b8739768c57b189e3e49->enter($__internal_d4e36e539bf21951c742b548f76be41d9d5261410fc6b8739768c57b189e3e49_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_d4e36e539bf21951c742b548f76be41d9d5261410fc6b8739768c57b189e3e49->leave($__internal_d4e36e539bf21951c742b548f76be41d9d5261410fc6b8739768c57b189e3e49_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
";
    }
}
