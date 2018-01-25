<?php

/* dlteam.html */
class __TwigTemplate_f290f5fafd6a5790d7404a4277299834659b7a1c77e74ba8f0eb654bab87fd5f extends yii\twig\Template
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
        echo "/src/css/dlteam.css\">
    <title>代理团队</title>
</head>
<body data-module=\"dlteam\">
<div class=\"layout\">
    <div class=\"head clearfix\">
        <ul>
            <li>代理</li>
            <li>带给我的收益(元)</li>
        </ul>
    </div>
    <div class=\"searchList\">
        <ul>
            <li>
                <a href=\"javascript:\">
                    <table>
                        <tbody>
                        <tr>
                            <td width=\"50%\">
                                <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index1.png\" alt=\"\">
                                <p>ID：";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "game_id", array()), "html", null, true);
        echo "</p><p>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "level", array()) == 2)) {
            echo "[二代]";
        } elseif (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "level", array()) == 1)) {
            echo "[一代]";
        } else {
            echo "[总代]";
        }
        echo "</p>
                            </td>
                            <td width=\"50%\">
                                <p>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profit", array()), "html", null, true);
        echo "</p>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </a>
            </li>

        </ul>
    </div>
    <p>他的团队</p>
    <div class=\"searchList\">
        <ul>
            ";
        // line 45
        if (((isset($context["nex_auth"]) ? $context["nex_auth"] : null) == 0)) {
            // line 46
            echo "                <li>该代理没有下级代理</li>
            ";
        } else {
            // line 48
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["nex_auth"]) ? $context["nex_auth"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["auth"]) {
                // line 49
                echo "                <li>
                    <a href=\"";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["auth"], "url", array()), "html", null, true);
                echo "\">
                        <table>
                            <tbody>
                            <tr>
                                <td width=\"50%\">
                                    <img src=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
                echo "/src/images/index1.png\" alt=\"\">
                                    <p>ID：";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["auth"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["auth"], "nickname", array()), "html", null, true);
                if (($this->getAttribute($context["auth"], "level", array()) == 2)) {
                    echo "[二代]";
                } elseif (($this->getAttribute($context["auth"], "level", array()) == 1)) {
                    echo "[一代]";
                } else {
                    echo "[总代]";
                }
                echo "</p>
                                </td>
                                <td width=\"50%\">
                                    <p>";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["auth"], "to_my_profit", array()), "html", null, true);
                echo "</p>
                                    <p>";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["auth"], "own_all_profit", array()), "html", null, true);
                echo "</p>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['auth'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "            ";
        }
        // line 70
        echo "        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>

<script>
    document.getElementsByClassName(\"layout\")[0].style.height=window.innerHeight+\"px\";
</script>

</html>";
    }

    public function getTemplateName()
    {
        return "dlteam.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 75,  158 => 74,  152 => 70,  149 => 69,  134 => 60,  130 => 59,  115 => 56,  111 => 55,  103 => 50,  100 => 49,  95 => 48,  91 => 46,  89 => 45,  72 => 31,  57 => 28,  53 => 27,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/dlteam.css">*/
/*     <title>代理团队</title>*/
/* </head>*/
/* <body data-module="dlteam">*/
/* <div class="layout">*/
/*     <div class="head clearfix">*/
/*         <ul>*/
/*             <li>代理</li>*/
/*             <li>带给我的收益(元)</li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             <li>*/
/*                 <a href="javascript:">*/
/*                     <table>*/
/*                         <tbody>*/
/*                         <tr>*/
/*                             <td width="50%">*/
/*                                 <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*                                 <p>ID：{{ user.game_id }}</p><p>{{ user.nickname }}{% if user.level == 2 %}[二代]{% elseif user.level == 1 %}[一代]{% else %}[总代]{% endif %}</p>*/
/*                             </td>*/
/*                             <td width="50%">*/
/*                                 <p>{{ user.profit }}</p>*/
/*                             </td>*/
/* */
/*                         </tr>*/
/*                         </tbody>*/
/*                     </table>*/
/*                 </a>*/
/*             </li>*/
/* */
/*         </ul>*/
/*     </div>*/
/*     <p>他的团队</p>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             {% if nex_auth == 0 %}*/
/*                 <li>该代理没有下级代理</li>*/
/*             {% else %}*/
/*             {% for auth in nex_auth %}*/
/*                 <li>*/
/*                     <a href="{{ auth.url }}">*/
/*                         <table>*/
/*                             <tbody>*/
/*                             <tr>*/
/*                                 <td width="50%">*/
/*                                     <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*                                     <p>ID：{{ auth.game_id }}</p><p>{{ auth.nickname }}{% if auth.level == 2 %}[二代]{% elseif auth.level == 1 %}[一代]{% else %}[总代]{% endif %}</p>*/
/*                                 </td>*/
/*                                 <td width="50%">*/
/*                                     <p>{{ auth.to_my_profit }}</p>*/
/*                                     <p>{{ auth.own_all_profit }}</p>*/
/*                                 </td>*/
/* */
/*                             </tr>*/
/*                             </tbody>*/
/*                         </table>*/
/*                     </a>*/
/*                 </li>*/
/*             {% endfor %}*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* */
/* <script>*/
/*     document.getElementsByClassName("layout")[0].style.height=window.innerHeight+"px";*/
/* </script>*/
/* */
/* </html>*/
