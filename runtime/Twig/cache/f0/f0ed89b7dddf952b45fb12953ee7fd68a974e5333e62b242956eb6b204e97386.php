<?php

/* dlmessage.html */
class __TwigTemplate_3701be583980ebe3cae62456a563d41c661321a71cccf06e68764dea24fee180 extends yii\twig\Template
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
        echo "/src/css/dlmessage.css\">

    <title>代理详情</title>
</head>
<body data-module=\"dlmessage\">
<div class=\"layout\">
    <div class=\"top\">
        <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index1.png\" alt=\"\">
        <p>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["nickname"]) ? $context["nickname"] : null), "html", null, true);
        echo "</p>
        <p>ID：";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["game_id"]) ? $context["game_id"] : null), "html", null, true);
        echo "</p>
    </div>
    <div class=\"searchList\">
        <ul>
            <li>
                <table>
                    <tbody>
                    <tr>
                        <td width=\"50%\">
                            玩家数量
                        </td>
                        <td width=\"50%\">
                            ";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["nex_player_num"]) ? $context["nex_player_num"] : null), "html", null, true);
        echo "
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <table>
                    <tbody>
                    <tr>
                        <td width=\"50%\">
                            代理数量
                        </td>
                        <td width=\"50%\">
                            ";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["nex_auth_num"]) ? $context["nex_auth_num"] : null), "html", null, true);
        echo "
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <table>
                    <tbody>
                    <tr>
                        <td width=\"50%\">
                            总创收(元)
                        </td>
                        <td width=\"50%\">
                            ";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["all_profit"]) ? $context["all_profit"] : null), "html", null, true);
        echo "
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
    <div class=\"searchList\">
        <ul>
            <li>

                <table>
                    <tbody>
                    <tr>
                        <td width=\"50%\">
                            手机号
                        </td>
                        <td width=\"50%\">
                            ";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : null), "html", null, true);
        echo "
                        </td>
                    </tr>

                    </tbody>
                </table>
                </tbody>
                </table>
            </li>
            <li>
                <table>
                    <tbody>
                    <tr>
                        <td width=\"50%\">
                            微信号
                        </td>
                        <td width=\"50%\">
                            ";
        // line 93
        echo twig_escape_filter($this->env, (isset($context["wechat"]) ? $context["wechat"] : null), "html", null, true);
        echo "
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <table>
                    <tbody>
                    <tr>
                        <td width=\"50%\">
                            注册时间
                        </td>
                        <td width=\"50%\">
                            ";
        // line 107
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["created_at"]) ? $context["created_at"] : null), "Y-m-d"), "html", null, true);
        echo "
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "dlmessage.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 118,  173 => 117,  160 => 107,  143 => 93,  123 => 76,  101 => 57,  84 => 43,  67 => 29,  52 => 17,  48 => 16,  44 => 15,  34 => 8,  30 => 7,  22 => 2,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="{{ app.language}}>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/dlmessage.css">*/
/* */
/*     <title>代理详情</title>*/
/* </head>*/
/* <body data-module="dlmessage">*/
/* <div class="layout">*/
/*     <div class="top">*/
/*         <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*         <p>{{ nickname }}</p>*/
/*         <p>ID：{{ game_id }}</p>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             <li>*/
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             玩家数量*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ nex_player_num }}*/
/*                         </td>*/
/*                     </tr>*/
/*                     </tbody>*/
/*                 </table>*/
/*             </li>*/
/*             <li>*/
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             代理数量*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ nex_auth_num }}*/
/*                         </td>*/
/*                     </tr>*/
/*                     </tbody>*/
/*                 </table>*/
/*             </li>*/
/*             <li>*/
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             总创收(元)*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ all_profit }}*/
/*                         </td>*/
/*                     </tr>*/
/*                     </tbody>*/
/*                 </table>*/
/*             </li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             <li>*/
/* */
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             手机号*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ phone }}*/
/*                         </td>*/
/*                     </tr>*/
/* */
/*                     </tbody>*/
/*                 </table>*/
/*                 </tbody>*/
/*                 </table>*/
/*             </li>*/
/*             <li>*/
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             微信号*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ wechat }}*/
/*                         </td>*/
/*                     </tr>*/
/*                     </tbody>*/
/*                 </table>*/
/*             </li>*/
/*             <li>*/
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             注册时间*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ created_at | date("Y-m-d") }}*/
/*                         </td>*/
/*                     </tr>*/
/*                     </tbody>*/
/*                 </table>*/
/*             </li>*/
/*         </ul>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* </html>*/
