<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* scrapper/index.html.twig */
class __TwigTemplate_2d707aac09b589807d25c9b222b7aee5fc673d3af310d303cd9d7ee75c02af19 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "scrapper/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "scrapper/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "scrapper/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello ScrapperController!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        echo "<header>
    <!--Navbar -->
    <nav class=\"mb-1 navbar navbar-expand-lg btn-light\">
        <ul class=\"navbar-nav ml-auto nav-flex-icons\">
            <li class=\"nav-item\">
                <a class=\"nav-link waves-effect waves-light\">
                    <i style=\"color: #33b5e5\" class=\"fas fa-print\"></i> Scrapper
                </a>
            </li>

        </ul>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent-3\"></div>
        </div>
    </nav>

    <!--/.Navbar -->
</header>


    <!--Main Navigation-->

    <!--Main layout-->
    <main>




    <!-- Grid container -->
    <div class=\"container my-4\">

        <!--Grid row-->
        <div class=\"row d-flex justify-content-center\">

            <!--Grid column-->
            <div class=\"col-md-6\">

                <!-- Material card -->
                <div class=\"card\">

                    <!-- Header -->
                    <h5 class=\"card-header info-color white-text text-center py-4\">
                        <strong>Upload your csv File</strong>
                    </h5>

                    <!--Card content-->
                    <div class=\"card-body\">

                        ";
        // line 52
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), 'form_start', ["attr" => ["class" => "md-form"]]);
        echo "
                            <div class=\"file-field\">
                                <div class=\"btn btn-light btn-sm float-left\">
                                    ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "file", [], "any", false, false, false, 55), 'row');
        echo "
                                </div>

                            </div>
                        <div class=\"file-field\">
                                <div class=\"btn btn-light btn-sm float-left\">
                                    ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "name", [], "any", false, false, false, 61), 'row');
        echo "
                                </div>

                            </div>
                        <button id=\"btnStart\" class=\"btn btn-outline-info btn-rounded btn-block waves-effect z-depth-0 mb-2\">Click
                            to upload</button>
                        ";
        // line 67
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), 'form_end');
        echo "

                        <!-- Action button -->


                    </div>

                </div>
                <!-- Material card -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


        <!-- Heading element to display the result -->
        <h2 id=\"demo\" class=\"my-5 h2 text-center\" style=\"color: #666;\"></h2>

    </div>
    </main>
    <!-- Grid container -->
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "scrapper/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 67,  147 => 61,  138 => 55,  132 => 52,  75 => 5,  57 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello ScrapperController!{% endblock %}

{% block body %}<header>
    <!--Navbar -->
    <nav class=\"mb-1 navbar navbar-expand-lg btn-light\">
        <ul class=\"navbar-nav ml-auto nav-flex-icons\">
            <li class=\"nav-item\">
                <a class=\"nav-link waves-effect waves-light\">
                    <i style=\"color: #33b5e5\" class=\"fas fa-print\"></i> Scrapper
                </a>
            </li>

        </ul>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent-3\"></div>
        </div>
    </nav>

    <!--/.Navbar -->
</header>


    <!--Main Navigation-->

    <!--Main layout-->
    <main>




    <!-- Grid container -->
    <div class=\"container my-4\">

        <!--Grid row-->
        <div class=\"row d-flex justify-content-center\">

            <!--Grid column-->
            <div class=\"col-md-6\">

                <!-- Material card -->
                <div class=\"card\">

                    <!-- Header -->
                    <h5 class=\"card-header info-color white-text text-center py-4\">
                        <strong>Upload your csv File</strong>
                    </h5>

                    <!--Card content-->
                    <div class=\"card-body\">

                        {{ form_start(form, {attr: {class: 'md-form'} }) }}
                            <div class=\"file-field\">
                                <div class=\"btn btn-light btn-sm float-left\">
                                    {{ form_row(form.file) }}
                                </div>

                            </div>
                        <div class=\"file-field\">
                                <div class=\"btn btn-light btn-sm float-left\">
                                    {{ form_row(form.name) }}
                                </div>

                            </div>
                        <button id=\"btnStart\" class=\"btn btn-outline-info btn-rounded btn-block waves-effect z-depth-0 mb-2\">Click
                            to upload</button>
                        {{ form_end(form) }}

                        <!-- Action button -->


                    </div>

                </div>
                <!-- Material card -->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


        <!-- Heading element to display the result -->
        <h2 id=\"demo\" class=\"my-5 h2 text-center\" style=\"color: #666;\"></h2>

    </div>
    </main>
    <!-- Grid container -->
{% endblock %}
", "scrapper/index.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/scrapper/templates/scrapper/index.html.twig");
    }
}
