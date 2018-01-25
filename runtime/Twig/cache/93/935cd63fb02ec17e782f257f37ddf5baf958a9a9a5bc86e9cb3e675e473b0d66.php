<?php

/* dltoday.html */
class __TwigTemplate_b5e11f71079862cc7809ebe9a678f5a1afd92f45e37d5a5f6d2f5f02894b2359 extends yii\twig\Template
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
<html lang=\"en\">
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
        echo "/src/css/dltoday.css\">

    <title>今日新增</title>
</head>
<body  data-module=\"dltoday\">
<div class=\"layout\">
    <div class=\"today clearfix\">
        <ul>
            <li>今日新增(人)</li>
            <li>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["today_auth"]) ? $context["today_auth"] : null), "num", array()), "html", null, true);
        echo "</li>
        </ul>
    </div>
    <div class=\"head clearfix\">
        <ul>
            <li>代理</li>
            <li>收益(元)</li>
        </ul>
    </div>
    <div class=\"searchList\">
        <ul>
            <li>
                ";
        // line 29
        if (((isset($context["error"]) ? $context["error"] : null) == 1)) {
            // line 30
            echo "                    <p>您没有下级代理</p>
                ";
        } else {
            // line 32
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["today_auth"]) ? $context["today_auth"] : null), "users", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
                // line 33
                echo "                            <a href=\"\">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td width=\"50%\">
                                            <img src=\"";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
                echo "/src/images/index1.png\" alt=\"\">
                                            <p>ID：";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "nickname", array()), "html", null, true);
                echo "</p>
                                        </td>
                                        <td width=\"50%\">
                                            <p>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "profit", array()), "html", null, true);
                echo "</p>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                ";
        }
        // line 51
        echo "
            </li>
        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script>
    document.getElementsByClassName(\"layout\")[0].style.height=window.innerHeight+\"px\";
</script>
</html>";
    }

    public function getTemplateName()
    {
        return "dltoday.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 58,  113 => 57,  105 => 51,  102 => 50,  88 => 42,  80 => 39,  76 => 38,  69 => 33,  64 => 32,  60 => 30,  58 => 29,  43 => 17,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/dltoday.css">*/
/* */
/*     <title>今日新增</title>*/
/* </head>*/
/* <body  data-module="dltoday">*/
/* <div class="layout">*/
/*     <div class="today clearfix">*/
/*         <ul>*/
/*             <li>今日新增(人)</li>*/
/*             <li>{{ today_auth.num }}</li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="head clearfix">*/
/*         <ul>*/
/*             <li>代理</li>*/
/*             <li>收益(元)</li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             <li>*/
/*                 {% if error == 1 %}*/
/*                     <p>您没有下级代理</p>*/
/*                 {% else %}*/
/*                     {% for val in today_auth.users %}*/
/*                             <a href="">*/
/*                                 <table>*/
/*                                     <tbody>*/
/*                                     <tr>*/
/*                                         <td width="50%">*/
/*                                             <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*                                             <p>ID：{{ val.game_id }}</p><p>{{ val.nickname }}</p>*/
/*                                         </td>*/
/*                                         <td width="50%">*/
/*                                             <p>{{ val.profit }}</p>*/
/*                                         </td>*/
/* */
/*                                     </tr>*/
/*                                     </tbody>*/
/*                                 </table>*/
/*                             </a>*/
/*                     {% endfor %}*/
/*                 {% endif %}*/
/* */
/*             </li>*/
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script>*/
/*     document.getElementsByClassName("layout")[0].style.height=window.innerHeight+"px";*/
/* </script>*/
/* </html>*/
