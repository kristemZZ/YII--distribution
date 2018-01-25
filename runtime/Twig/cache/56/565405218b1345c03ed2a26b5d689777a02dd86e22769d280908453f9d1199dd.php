<?php

/* authrecord.html */
class __TwigTemplate_92650768511597a9639f0cadd4518d10532f6ab4389aaae38078f1a0693ba79f extends yii\twig\Template
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
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "language", array()), "html", null, true);
        echo ">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/base.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/sqrecord.css\">

    <title>授权记录</title>
</head>
<body data-module=\"sqrecord\">
<div class=\"layout\">
    <div class=\"head clearfix\">
        <ul>
            <li>代理</li>
            <li>授权日期</li>
        </ul>
    </div>
    <div class=\"searchList\">
        <ul>
            <li>
                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["info"]) ? $context["info"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
            // line 24
            echo "                    <a href=\"javascript:\">
                        <table>
                            <tbody>
                            <tr>
                                <td width=\"50%\">
                                    <img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
            echo "/src/images/index1.png\" alt=\"\">
                                    <p>ID：";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "game_id", array()), "html", null, true);
            echo "</p><p>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "nickname", array()), "html", null, true);
            echo "</p>
                                </td>
                                <td width=\"50%\">
                                    <p>";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["val"], "auth_time", array()), "Y-m-d"), "html", null, true);
            echo "</p><p>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["val"], "auth_time", array()), "H:i:s"), "html", null, true);
            echo "</p>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </a>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 41
            echo "                <a>还没有记录</a>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
            </li>
        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "authrecord.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 50,  106 => 49,  98 => 43,  91 => 41,  76 => 33,  68 => 30,  64 => 29,  57 => 24,  52 => 23,  34 => 8,  30 => 7,  22 => 2,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="{{ app.language}}>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/sqrecord.css">*/
/* */
/*     <title>授权记录</title>*/
/* </head>*/
/* <body data-module="sqrecord">*/
/* <div class="layout">*/
/*     <div class="head clearfix">*/
/*         <ul>*/
/*             <li>代理</li>*/
/*             <li>授权日期</li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             <li>*/
/*                 {% for val in info %}*/
/*                     <a href="javascript:">*/
/*                         <table>*/
/*                             <tbody>*/
/*                             <tr>*/
/*                                 <td width="50%">*/
/*                                     <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*                                     <p>ID：{{ val.game_id }}</p><p>{{ val.nickname }}</p>*/
/*                                 </td>*/
/*                                 <td width="50%">*/
/*                                     <p>{{ val.auth_time | date("Y-m-d") }}</p><p>{{ val.auth_time | date("H:i:s") }}</p>*/
/*                                 </td>*/
/* */
/*                             </tr>*/
/*                             </tbody>*/
/*                         </table>*/
/*                     </a>*/
/*                 {%else%}*/
/*                 <a>还没有记录</a>*/
/*                 {% endfor %}*/
/* */
/*             </li>*/
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* </html>*/
