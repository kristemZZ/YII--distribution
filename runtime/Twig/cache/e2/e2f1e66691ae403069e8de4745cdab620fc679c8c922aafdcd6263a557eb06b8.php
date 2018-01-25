<?php

/* myagent.html */
class __TwigTemplate_92e9364f29e75d9bab22a3976ddb9b74280bedc9c92cf7e3393cdad304d1308d extends yii\twig\Template
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
        echo "/src/css/myagent.css\">
    <title>我的代理</title>
</head>
<body data-module=\"myagent\">
<div class=\"layout\">
    <div class=\"mouth\">
        <i></i>
        <div class=\"mui_scroll\">
            <ul id=\"uls\">
                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["month"]) ? $context["month"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 18
            echo "                    <li m=\"";
            echo twig_escape_filter($this->env, $context["m"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["m"], "html", null, true);
            echo "月收益</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "            </ul>
        </div>
    </div>
    <div class=\"playerBox\">
        <ul>
            <li>
                <p> 总数(人)</p>
                <p>";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["num"]) ? $context["num"] : null), "html", null, true);
        echo "</p>
            </li>
            <li>
                <p><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/dltoday")), "html", null, true);
        echo "\">今日新增(人)<i></i></a></p>

                <p>";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["today_num"]) ? $context["today_num"] : null), "html", null, true);
        echo "</p>

            </li>
        </ul>
    </div>
    <div class=\"searchBox\">
        <input type=\"hidden\" id=\"sign\" value=\"auth\">
        <input type=\"hidden\" id=\"type\" value=\"m\">
        <input type=\"text\" placeholder=\"请输入代理ID\" id=\"searchinfo\"><button id=\"search\">查询</button>
        <p id=\"timeCh\">时间筛选<i id=\"sj\"></i></p>
    </div>
    <div class=\"searchList\">




        <ul>
            <li>
                <table>
                    <thead>
                    <tr>
                        <th width=\"10%\">排序</th>
                        <th width=\"70%\">代理</th>
                        <th width=\"20%\">收益(元)</th>
                    </tr>
                    </thead>
                </table>
            </li>
            <li id=\"auth_list\">

                ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["my_agent"]) ? $context["my_agent"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["agent"]) {
            // line 63
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "url", array()), "html", null, true);
            echo "\">
                        <table>
                            <tbody>
                            <tr>
                                <td width=\"10%\">";
            // line 67
            echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
            echo "</td>
                                <td width=\"60%\">
                                    <img src=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
            echo "/src/images/index1.png\" alt=\"\"><p>ID：";
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "game_id", array()), "html", null, true);
            echo "</p><p>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "nickname", array()), "html", null, true);
            if (($this->getAttribute($context["agent"], "level", array()) == 2)) {
                echo "[二代]";
            } elseif (($this->getAttribute($context["agent"], "level", array()) == 1)) {
                echo "[一代]";
            } else {
                echo "[总代]";
            }
            echo "</p>
                                </td>
                                <td width=\"30%\">
                                    ";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "to_my_profit", array()), "html", null, true);
            echo "
                                    <p>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["agent"], "own_all_profit", array()), "html", null, true);
            echo "</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </a>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "            </li>

        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/myagent.js\"></script>


</html>";
    }

    public function getTemplateName()
    {
        return "myagent.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 89,  178 => 88,  174 => 87,  170 => 86,  162 => 80,  149 => 73,  145 => 72,  128 => 69,  123 => 67,  115 => 63,  111 => 62,  78 => 32,  73 => 30,  67 => 27,  58 => 20,  47 => 18,  43 => 17,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/myagent.css">*/
/*     <title>我的代理</title>*/
/* </head>*/
/* <body data-module="myagent">*/
/* <div class="layout">*/
/*     <div class="mouth">*/
/*         <i></i>*/
/*         <div class="mui_scroll">*/
/*             <ul id="uls">*/
/*                 {% for m in month %}*/
/*                     <li m="{{ m }}">{{ m }}月收益</li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/*     <div class="playerBox">*/
/*         <ul>*/
/*             <li>*/
/*                 <p> 总数(人)</p>*/
/*                 <p>{{ num }}</p>*/
/*             </li>*/
/*             <li>*/
/*                 <p><a href="{{ url(['/default/dltoday']) }}">今日新增(人)<i></i></a></p>*/
/* */
/*                 <p>{{ today_num }}</p>*/
/* */
/*             </li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="searchBox">*/
/*         <input type="hidden" id="sign" value="auth">*/
/*         <input type="hidden" id="type" value="m">*/
/*         <input type="text" placeholder="请输入代理ID" id="searchinfo"><button id="search">查询</button>*/
/*         <p id="timeCh">时间筛选<i id="sj"></i></p>*/
/*     </div>*/
/*     <div class="searchList">*/
/* */
/* */
/* */
/* */
/*         <ul>*/
/*             <li>*/
/*                 <table>*/
/*                     <thead>*/
/*                     <tr>*/
/*                         <th width="10%">排序</th>*/
/*                         <th width="70%">代理</th>*/
/*                         <th width="20%">收益(元)</th>*/
/*                     </tr>*/
/*                     </thead>*/
/*                 </table>*/
/*             </li>*/
/*             <li id="auth_list">*/
/* */
/*                 {% for key,agent in my_agent %}*/
/*                     <a href="{{ agent.url }}">*/
/*                         <table>*/
/*                             <tbody>*/
/*                             <tr>*/
/*                                 <td width="10%">{{ key+1 }}</td>*/
/*                                 <td width="60%">*/
/*                                     <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt=""><p>ID：{{ agent.game_id }}</p><p>{{ agent.nickname }}{% if agent.level == 2 %}[二代]{% elseif agent.level == 1 %}[一代]{% else %}[总代]{% endif %}</p>*/
/*                                 </td>*/
/*                                 <td width="30%">*/
/*                                     {{ agent.to_my_profit }}*/
/*                                     <p>{{ agent.own_all_profit }}</p>*/
/*                                 </td>*/
/*                             </tr>*/
/*                             </tbody>*/
/*                         </table>*/
/*                     </a>*/
/*                 {% endfor %}*/
/*             </li>*/
/* */
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/myagent.js"></script>*/
/* */
/* */
/* </html>*/
