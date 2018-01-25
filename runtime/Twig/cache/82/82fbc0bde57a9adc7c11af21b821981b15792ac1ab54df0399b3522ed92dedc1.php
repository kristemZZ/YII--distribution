<?php

/* myprofit.html */
class __TwigTemplate_a2f71121be00245eafc587c671bef9c6b01e4ca609fc7b59ec469d8433e73d8e extends yii\twig\Template
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
    <!--<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.css\">-->
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/base.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/myIncome.css\">

    <title>我的收益</title>
</head>
<body data-module=\"myincome\">
<div class=\"layout\">
    <div class=\"mouth\">
        <i></i>
        <div class=\"mui_scroll\">
            <ul id=\"uls\">
                ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["month"]) ? $context["month"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 20
            echo "                <li month=\"";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "月收益</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </ul>
        </div>
    </div>
    <div class=\"incomeNav clearfix\">
        <ul>
            <li class=\"li_tap\"><a href=\"javascript:;\" class=\"on\">今日收益</a></li>
            <li class=\"li_tap\"><a href=\"javascript:;\">本周收益</a></li>
            <li class=\"li_tap\"><a href=\"javascript:;\" id=\"show_text\">累计收益</a></li>
        </ul>
        <i id=\"iconBtn\"></i>
    </div>
    <div class=\"incomeBox\">
        <input type=\"hidden\" id=\"today\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["today_profit"]) ? $context["today_profit"] : null), "html", null, true);
        echo "\">
        <input type=\"hidden\" id=\"week\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["week_profit"]) ? $context["week_profit"] : null), "html", null, true);
        echo "\">
        <input type=\"hidden\" id=\"all\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["all_profit"]) ? $context["all_profit"] : null), "html", null, true);
        echo "\">
        <p id='profit'>";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["today_profit"]) ? $context["today_profit"] : null), "html", null, true);
        echo "</p>
    </div>
    <div class=\"searchBox\">
        <input type=\"hidden\" id=\"type\" value=\"0m\">
        <input type=\"text\" placeholder=\"请输入代理ID\" id=\"searchinfo\"><button id=\"search\">查询</button>
    </div>
    <div class=\"bgbox\">
        <!-- 今日收益 -->
        <div class=\"searchList today show\">
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
                <li id=\"today_1\">
                    ";
        // line 59
        if (((isset($context["today_info"]) ? $context["today_info"] : null) == 0)) {
            // line 60
            echo "                        <a>还没有下级代理</a>
                    ";
        } else {
            // line 62
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["today_info"]) ? $context["today_info"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["one"]) {
                // line 63
                echo "
                            <a href=\"javascript:\">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td width=\"10%\">";
                // line 68
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo "</td>
                                        <td width=\"70%\">
                                            <img src=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
                echo "/src/images/index1.png\" alt=\"\"><p>ID：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "nickname", array()), "html", null, true);
                echo "</p>
                                        </td>
                                        <td width=\"20%\">";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "to_my_profit_today", array()), "html", null, true);
                echo "</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </a>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['one'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "                    ";
        }
        // line 79
        echo "                </li>
            </ul>
        </div>
        <!-- 本周收益 -->
        <div class=\"searchList week\">
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
                <li id=\"week_1\">
                    ";
        // line 97
        if (((isset($context["today_info"]) ? $context["today_info"] : null) == 0)) {
            // line 98
            echo "                    <a>还没有下级代理</a>
                    ";
        } else {
            // line 100
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["today_info"]) ? $context["today_info"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["one"]) {
                // line 101
                echo "                    <a href=\"javascript:\">
                        <table>
                            <tbody>
                            <tr>
                                <td width=\"10%\">";
                // line 105
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo "</td>
                                <td width=\"70%\">
                                    <img src=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
                echo "/src/images/index1.png\" alt=\"\"><p>ID：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "nickname", array()), "html", null, true);
                echo "</p>
                                </td>
                                <td width=\"20%\">";
                // line 109
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "to_my_profit_week", array()), "html", null, true);
                echo "</td>
                            </tr>
                            </tbody>
                        </table>
                    </a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['one'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            echo "                    ";
        }
        // line 116
        echo "                </li>
            </ul>
        </div>
        <!-- 总收益 -->
        <div class=\"searchList total\">
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
                <li id=\"month\">
                    ";
        // line 134
        if (((isset($context["today_info"]) ? $context["today_info"] : null) == 0)) {
            // line 135
            echo "                    <a>还没有下级代理</a>
                    ";
        } else {
            // line 137
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["today_info"]) ? $context["today_info"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["one"]) {
                // line 138
                echo "                    <a href=\"javascript:\">
                        <table>
                            <tbody>
                            <tr>
                                <td width=\"10%\">";
                // line 142
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo "</td>
                                <td width=\"70%\">
                                    <img src=\"";
                // line 144
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
                echo "/src/images/index1.png\" alt=\"\"><p>ID：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "nickname", array()), "html", null, true);
                echo "</p>
                                </td>
                                <td width=\"20%\">";
                // line 146
                echo twig_escape_filter($this->env, $this->getAttribute($context["one"], "to_my_profit_all", array()), "html", null, true);
                echo "</td>
                            </tr>
                            </tbody>
                        </table>
                    </a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['one'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "                    ";
        }
        // line 153
        echo "                </li>
            </ul>
        </div>
    </div>
</div>
</body>
<script src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/jquery-2.1.1.min.js\"></script>
<script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/myincome.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "myprofit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  317 => 163,  313 => 162,  309 => 161,  305 => 160,  301 => 159,  293 => 153,  290 => 152,  278 => 146,  269 => 144,  264 => 142,  258 => 138,  253 => 137,  249 => 135,  247 => 134,  227 => 116,  224 => 115,  212 => 109,  203 => 107,  198 => 105,  192 => 101,  187 => 100,  183 => 98,  181 => 97,  161 => 79,  158 => 78,  146 => 72,  137 => 70,  132 => 68,  125 => 63,  120 => 62,  116 => 60,  114 => 59,  89 => 37,  85 => 36,  81 => 35,  77 => 34,  63 => 22,  52 => 20,  48 => 19,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <!--<link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.css">-->*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/myIncome.css">*/
/* */
/*     <title>我的收益</title>*/
/* </head>*/
/* <body data-module="myincome">*/
/* <div class="layout">*/
/*     <div class="mouth">*/
/*         <i></i>*/
/*         <div class="mui_scroll">*/
/*             <ul id="uls">*/
/*                 {% for i in month %}*/
/*                 <li month="{{ i }}">{{ i }}月收益</li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/*     <div class="incomeNav clearfix">*/
/*         <ul>*/
/*             <li class="li_tap"><a href="javascript:;" class="on">今日收益</a></li>*/
/*             <li class="li_tap"><a href="javascript:;">本周收益</a></li>*/
/*             <li class="li_tap"><a href="javascript:;" id="show_text">累计收益</a></li>*/
/*         </ul>*/
/*         <i id="iconBtn"></i>*/
/*     </div>*/
/*     <div class="incomeBox">*/
/*         <input type="hidden" id="today" value="{{ today_profit }}">*/
/*         <input type="hidden" id="week" value="{{ week_profit }}">*/
/*         <input type="hidden" id="all" value="{{ all_profit }}">*/
/*         <p id='profit'>{{ today_profit }}</p>*/
/*     </div>*/
/*     <div class="searchBox">*/
/*         <input type="hidden" id="type" value="0m">*/
/*         <input type="text" placeholder="请输入代理ID" id="searchinfo"><button id="search">查询</button>*/
/*     </div>*/
/*     <div class="bgbox">*/
/*         <!-- 今日收益 -->*/
/*         <div class="searchList today show">*/
/*             <ul>*/
/*                 <li>*/
/*                     <table>*/
/*                         <thead>*/
/*                         <tr>*/
/*                             <th width="10%">排序</th>*/
/*                             <th width="70%">代理</th>*/
/*                             <th width="20%">收益(元)</th>*/
/*                         </tr>*/
/*                         </thead>*/
/*                     </table>*/
/*                 </li>*/
/*                 <li id="today_1">*/
/*                     {% if today_info == 0 %}*/
/*                         <a>还没有下级代理</a>*/
/*                     {% else %}*/
/*                         {% for key,one in today_info %}*/
/* */
/*                             <a href="javascript:">*/
/*                                 <table>*/
/*                                     <tbody>*/
/*                                     <tr>*/
/*                                         <td width="10%">{{ key+1 }}</td>*/
/*                                         <td width="70%">*/
/*                                             <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt=""><p>ID：{{ one.game_id }}</p><p>{{ one.nickname }}</p>*/
/*                                         </td>*/
/*                                         <td width="20%">{{ one.to_my_profit_today }}</td>*/
/*                                     </tr>*/
/*                                     </tbody>*/
/*                                 </table>*/
/*                             </a>*/
/*                         {% endfor %}*/
/*                     {% endif %}*/
/*                 </li>*/
/*             </ul>*/
/*         </div>*/
/*         <!-- 本周收益 -->*/
/*         <div class="searchList week">*/
/*             <ul>*/
/*                 <li>*/
/*                     <table>*/
/*                         <thead>*/
/*                         <tr>*/
/*                             <th width="10%">排序</th>*/
/*                             <th width="70%">代理</th>*/
/*                             <th width="20%">收益(元)</th>*/
/*                         </tr>*/
/*                         </thead>*/
/*                     </table>*/
/*                 </li>*/
/*                 <li id="week_1">*/
/*                     {% if today_info == 0 %}*/
/*                     <a>还没有下级代理</a>*/
/*                     {% else %}*/
/*                     {% for key,one in today_info %}*/
/*                     <a href="javascript:">*/
/*                         <table>*/
/*                             <tbody>*/
/*                             <tr>*/
/*                                 <td width="10%">{{ key+1 }}</td>*/
/*                                 <td width="70%">*/
/*                                     <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt=""><p>ID：{{ one.game_id }}</p><p>{{ one.nickname }}</p>*/
/*                                 </td>*/
/*                                 <td width="20%">{{ one.to_my_profit_week }}</td>*/
/*                             </tr>*/
/*                             </tbody>*/
/*                         </table>*/
/*                     </a>*/
/*                     {% endfor %}*/
/*                     {% endif %}*/
/*                 </li>*/
/*             </ul>*/
/*         </div>*/
/*         <!-- 总收益 -->*/
/*         <div class="searchList total">*/
/*             <ul>*/
/*                 <li>*/
/*                     <table>*/
/*                         <thead>*/
/*                         <tr>*/
/*                             <th width="10%">排序</th>*/
/*                             <th width="70%">代理</th>*/
/*                             <th width="20%">收益(元)</th>*/
/*                         </tr>*/
/*                         </thead>*/
/*                     </table>*/
/*                 </li>*/
/*                 <li id="month">*/
/*                     {% if today_info == 0 %}*/
/*                     <a>还没有下级代理</a>*/
/*                     {% else %}*/
/*                     {% for key,one in today_info %}*/
/*                     <a href="javascript:">*/
/*                         <table>*/
/*                             <tbody>*/
/*                             <tr>*/
/*                                 <td width="10%">{{ key+1 }}</td>*/
/*                                 <td width="70%">*/
/*                                     <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt=""><p>ID：{{ one.game_id }}</p><p>{{ one.nickname }}</p>*/
/*                                 </td>*/
/*                                 <td width="20%">{{ one.to_my_profit_all }}</td>*/
/*                             </tr>*/
/*                             </tbody>*/
/*                         </table>*/
/*                     </a>*/
/*                     {% endfor %}*/
/*                     {% endif %}*/
/*                 </li>*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/jquery-2.1.1.min.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/myincome.js"></script>*/
/* </html>*/
