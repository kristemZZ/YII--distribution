<?php

/* mydata.html */
class __TwigTemplate_f29033aa021dffde6fad478edd9db7108fe5c296944964d9843e82f7ba39e4aa extends yii\twig\Template
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
        echo "
<!DOCTYPE html>
<html lang=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "language", array()), "html", null, true);
        echo ">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/base.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.css\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.poppicker.css\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.picker.css\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.dtpicker.css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/mydata.css\">
    <title>我的资料</title>
</head>
<body data-module=\"mydata\">
<div class=\"layout\">
    <div class=\"top\">
        <div class=\"upgrade\">升级</div>
        <img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index1.png\" alt=\"\">
        <p>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname", array()), "html", null, true);
        echo "</p>
        <p>ID：";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "game_id", array()), "html", null, true);
        echo "<i>|</i>";
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "level", array()) == 2)) {
            echo "二级代理";
        } elseif (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "level", array()) == 1)) {
            echo "一级代理";
        } else {
            echo "总代理";
        }
        echo "</p>
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
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phone", array()), "html", null, true);
        echo "
                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/card/getcode")), "html", null, true);
        echo "\">
                    <table>
                        <tbody>
                        <tr>
                            <td width=\"50%\">
                                银行卡号
                            </td>
                            <td width=\"50%\">
                                ";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cardinfo"]) ? $context["cardinfo"] : null), "card_num", array()), "html", null, true);
        echo "
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </a>
            </li>
            <li>
                <a href=\"/default/modifypwd\">
                    <table>
                        <tbody>
                        <tr>
                            <td width=\"50%\">
                                修改登录密码
                            </td>
                            <td width=\"50%\">
                                <a href=\"\"></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </a>
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
                            地区
                        </td>
                        <td width=\"50%\" id=\"showAddress\">
                            <span id=\"province\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "province", array()), "html", null, true);
        echo "</span><span id=\"city\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "city", array()), "html", null, true);
        echo "</span>
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
                            生日
                        </td>
                        <td width=\"50%\" id=\"showYMD\">
                            ";
        // line 102
        if ( !(null === $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday", array()))) {
            // line 103
            echo "                            ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday", array()), "Y-m-d"), "html", null, true);
            echo "
                            ";
        } else {
            // line 105
            echo "                            ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y-m-d"), "html", null, true);
            echo "
                            ";
        }
        // line 107
        echo "                        </td>
                    </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
</div>
</body>
<script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.poppicker.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.dtpicker.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=\"";
        // line 121
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.picker.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/city.data-3.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
<script src=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/mydata.js\"></script>
<script>

</script>

</html>";
    }

    public function getTemplateName()
    {
        return "mydata.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 123,  223 => 122,  219 => 121,  215 => 120,  211 => 119,  207 => 118,  203 => 117,  199 => 116,  188 => 107,  182 => 105,  176 => 103,  174 => 102,  152 => 85,  113 => 49,  102 => 41,  92 => 34,  69 => 22,  65 => 21,  61 => 20,  51 => 13,  47 => 12,  43 => 11,  39 => 10,  35 => 9,  31 => 8,  23 => 3,  19 => 1,);
    }
}
/* */
/* <!DOCTYPE html>*/
/* <html lang="{{ app.language}}>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" type="text/css" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.css"/>*/
/*     <link rel="stylesheet" type="text/css" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.poppicker.css"/>*/
/*     <link rel="stylesheet" type="text/css" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.picker.css"/>*/
/*     <link rel="stylesheet" type="text/css" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.dtpicker.css"/>*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/mydata.css">*/
/*     <title>我的资料</title>*/
/* </head>*/
/* <body data-module="mydata">*/
/* <div class="layout">*/
/*     <div class="top">*/
/*         <div class="upgrade">升级</div>*/
/*         <img src="{{ app.params.skinUrl }}/src/images/index1.png" alt="">*/
/*         <p>{{ user.nickname }}</p>*/
/*         <p>ID：{{ user.game_id }}<i>|</i>{% if user.level == 2 %}二级代理{% elseif user.level == 1 %}一级代理{% else %}总代理{% endif %}</p>*/
/*     </div>*/
/*     <div class="searchList">*/
/*         <ul>*/
/*             <li>*/
/*                 <table>*/
/*                     <tbody>*/
/*                     <tr>*/
/*                         <td width="50%">*/
/*                             手机号*/
/*                         </td>*/
/*                         <td width="50%">*/
/*                             {{ user.phone }}*/
/*                         </td>*/
/*                     </tr>*/
/*                     </tbody>*/
/*                 </table>*/
/*             </li>*/
/*             <li>*/
/*                 <a href="{{ url(['/card/getcode']) }}">*/
/*                     <table>*/
/*                         <tbody>*/
/*                         <tr>*/
/*                             <td width="50%">*/
/*                                 银行卡号*/
/*                             </td>*/
/*                             <td width="50%">*/
/*                                 {{ cardinfo.card_num }}*/
/*                             </td>*/
/*                         </tr>*/
/*                         </tbody>*/
/*                     </table>*/
/*                 </a>*/
/*             </li>*/
/*             <li>*/
/*                 <a href="/default/modifypwd">*/
/*                     <table>*/
/*                         <tbody>*/
/*                         <tr>*/
/*                             <td width="50%">*/
/*                                 修改登录密码*/
/*                             </td>*/
/*                             <td width="50%">*/
/*                                 <a href=""></a>*/
/*                             </td>*/
/*                         </tr>*/
/*                         </tbody>*/
/*                     </table>*/
/*                 </a>*/
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
/*                             地区*/
/*                         </td>*/
/*                         <td width="50%" id="showAddress">*/
/*                             <span id="province">{{ user.province }}</span><span id="city">{{ user.city }}</span>*/
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
/*                             生日*/
/*                         </td>*/
/*                         <td width="50%" id="showYMD">*/
/*                             {% if user.birthday is not null %}*/
/*                             {{ user.birthday | date('Y-m-d') }}*/
/*                             {% else %}*/
/*                             {{ now | date('Y-m-d') }}*/
/*                             {% endif %}*/
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
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js" type="text/javascript" charset="utf-8"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.poppicker.js" type="text/javascript" charset="utf-8"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.dtpicker.js" type="text/javascript" charset="utf-8"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.picker.js" type="text/javascript" charset="utf-8"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/city.data-3.js" type="text/javascript" charset="utf-8"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/mydata.js"></script>*/
/* <script>*/
/* */
/* </script>*/
/* */
/* </html>*/
