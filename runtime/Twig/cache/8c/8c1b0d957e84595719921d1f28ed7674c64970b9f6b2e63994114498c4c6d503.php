<?php

/* auth.html */
class __TwigTemplate_43ee539a2d646725aff409238ba949504f8c444dba4fb93a918784e6f581c38b extends yii\twig\Template
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
        echo "/src/css/lib/mui/mui.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/auth.css\">

    <title>授权代理</title>
</head>
<body data-module=\"auth\">
<div class=\"layout\">
    <div class=\"searchBox\">
        <input type=\"text\" placeholder=\"请输入代理ID\" id=\"searchinfo\"><i id=\"search\">搜索</i>
        <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/authrecord")), "html", null, true);
        echo "\">授权记录</a>
    </div>
    <div class=\"searchList\">
        <ul id=\"game_list\">
            ";
        // line 21
        if (((isset($context["players"]) ? $context["players"] : null) == 0)) {
            // line 22
            echo "                <li>没有玩家可以授权</li>
            ";
        } else {
            // line 24
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["players"]) ? $context["players"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
                // line 25
                echo "                    <li>
                        <table>
                            <tbody>
                            <tr>
                                <td width=\"50%\">
                                    <img src=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
                echo "/src/images/index1.png\" alt=\"\">
                                    <p>ID：";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "nickname", array()), "html", null, true);
                echo "</p>
                                </td>
                                <td width=\"50%\">
                                    <i class=\"sure\" gameid = \"";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "id", array()), "html", null, true);
                echo "\"></i>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "            ";
        }
        // line 42
        echo "

        </ul>
    </div>
    <div class=\"bottom\">
        <input type=\"hidden\" name=\"game_ids\" value=\"\" id=\"game_ids\">
        <i class=\"sureBtn\" id=\"sureBtn\">确认授权</i>
    </div>
</div>
</body>
<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/auth.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "auth.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 55,  119 => 54,  115 => 53,  111 => 52,  99 => 42,  96 => 41,  83 => 34,  75 => 31,  71 => 30,  64 => 25,  59 => 24,  55 => 22,  53 => 21,  46 => 17,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/auth.css">*/
/* */
/*     <title>授权代理</title>*/
/* </head>*/
/* <body data-module="auth">*/
/* <div class="layout">*/
/*     <div class="searchBox">*/
/*         <input type="text" placeholder="请输入代理ID" id="searchinfo"><i id="search">搜索</i>*/
/*         <a href="{{ url(['/default/authrecord']) }}">授权记录</a>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul id="game_list">*/
/*             {% if players == 0 %}*/
/*                 <li>没有玩家可以授权</li>*/
/*             {% else %}*/
/*                 {% for val in players %}*/
/*                     <li>*/
/*                         <table>*/
/*                             <tbody>*/
/*                             <tr>*/
/*                                 <td width="50%">*/
/*                                     <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*                                     <p>ID：{{ val.game_id }}</p><p>{{ val.nickname }}</p>*/
/*                                 </td>*/
/*                                 <td width="50%">*/
/*                                     <i class="sure" gameid = "{{ val.id }}"></i>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             </tbody>*/
/*                         </table>*/
/*                     </li>*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/* */
/* */
/*         </ul>*/
/*     </div>*/
/*     <div class="bottom">*/
/*         <input type="hidden" name="game_ids" value="" id="game_ids">*/
/*         <i class="sureBtn" id="sureBtn">确认授权</i>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/auth.js"></script>*/
/* </html>*/
