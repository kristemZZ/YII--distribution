<?php

/* myplayer.html */
class __TwigTemplate_6a3a43558669da8d6b3fa16f78bee6c7834efa45716848a5d2d3b3688719c928 extends yii\twig\Template
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
        echo "/src/css/myplayer.css\">
    <title>我的玩家</title>
</head>
<body data-module=\"myplayer\">
<div class=\"layout\">
    <div class=\"mouth\">
        <i></i>
        <div class=\"mui_scroll\">
            <ul id=\"uls\">
                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["month"]) ? $context["month"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 18
            echo "                    <li m=\"";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "月收益</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
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
        echo twig_escape_filter($this->env, (isset($context["game_num"]) ? $context["game_num"] : null), "html", null, true);
        echo "</p>
            </li>
            <li>
                <p><a href=\"\">今日新增(人)<i></i></a></p>
                <p>";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["today_game_num"]) ? $context["today_game_num"] : null), "html", null, true);
        echo "</p>
            </li>
        </ul>
    </div>
    <div class=\"searchBox\">
        <input type=\"hidden\" id=\"sign\" value=\"player\">
        <input type=\"hidden\" id=\"type\" value=\"m\">
        <input type=\"text\" placeholder=\"请输入玩家ID\" id=\"searchinfo\"><button id=\"search\">查询</button>
        <p id=\"timeCh\">时间筛选<i id=\"sj\"></i></p>
    </div>
    <div class=\"searchList\">




        <ul>
            <li>
                <table>
                    <thead>
                    <tr>
                        <th width=\"10%\">排序</th>
                        <th width=\"70%\">玩家</th>
                        <th width=\"20%\">收益</th>
                    </tr>
                    </thead>
                </table>
            </li>
            <li id=\"auth_list\">
                ";
        // line 59
        if (((isset($context["game_users"]) ? $context["game_users"] : null) == 0)) {
            // line 60
            echo "                        <li>您还没有下级玩家</li>
                ";
        } else {
            // line 62
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["game_users"]) ? $context["game_users"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["game"]) {
                // line 63
                echo "                        <a href=\"javascript:\">
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
                echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "game_id", array()), "html", null, true);
                echo "</p><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "nickname", array()), "html", null, true);
                echo "</p>
                                    </td>
                                    <td width=\"30%\">
                                        <p>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "gameuser_profit", array()), "html", null, true);
                echo "</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['game'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "                ";
        }
        // line 80
        echo "            </li>

        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/myagent.js\"></script>

</html>";
    }

    public function getTemplateName()
    {
        return "myplayer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 89,  172 => 88,  168 => 87,  164 => 86,  156 => 80,  153 => 79,  140 => 72,  130 => 69,  125 => 67,  119 => 63,  114 => 62,  110 => 60,  108 => 59,  77 => 31,  70 => 27,  61 => 20,  50 => 18,  46 => 17,  34 => 8,  30 => 7,  22 => 2,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="{{ app.language}}>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/myplayer.css">*/
/*     <title>我的玩家</title>*/
/* </head>*/
/* <body data-module="myplayer">*/
/* <div class="layout">*/
/*     <div class="mouth">*/
/*         <i></i>*/
/*         <div class="mui_scroll">*/
/*             <ul id="uls">*/
/*                 {% for i in month %}*/
/*                     <li m="{{ i }}">{{ i }}月收益</li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/*     <div class="playerBox">*/
/*         <ul>*/
/*             <li>*/
/*                 <p> 总数(人)</p>*/
/*                 <p>{{ game_num }}</p>*/
/*             </li>*/
/*             <li>*/
/*                 <p><a href="">今日新增(人)<i></i></a></p>*/
/*                 <p>{{ today_game_num }}</p>*/
/*             </li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="searchBox">*/
/*         <input type="hidden" id="sign" value="player">*/
/*         <input type="hidden" id="type" value="m">*/
/*         <input type="text" placeholder="请输入玩家ID" id="searchinfo"><button id="search">查询</button>*/
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
/*                         <th width="70%">玩家</th>*/
/*                         <th width="20%">收益</th>*/
/*                     </tr>*/
/*                     </thead>*/
/*                 </table>*/
/*             </li>*/
/*             <li id="auth_list">*/
/*                 {% if game_users == 0 %}*/
/*                         <li>您还没有下级玩家</li>*/
/*                 {% else %}*/
/*                     {% for key,game in game_users %}*/
/*                         <a href="javascript:">*/
/*                             <table>*/
/*                                 <tbody>*/
/*                                 <tr>*/
/*                                     <td width="10%">{{ key+1 }}</td>*/
/*                                     <td width="60%">*/
/*                                         <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt=""><p>ID：{{ game.game_id }}</p><p>{{ game.nickname }}</p>*/
/*                                     </td>*/
/*                                     <td width="30%">*/
/*                                         <p>{{ game.gameuser_profit }}</p>*/
/*                                     </td>*/
/*                                 </tr>*/
/*                                 </tbody>*/
/*                             </table>*/
/*                         </a>*/
/*                     {% endfor %}*/
/*                 {% endif %}*/
/*             </li>*/
/* */
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/myagent.js"></script>*/
/* */
/* </html>*/
