<?php

/* index.html */
class __TwigTemplate_6eaa3da97d14563163f0abe6dc92302dab7142c97f0058ee2bd3ce02a4443e08 extends yii\twig\Template
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
        echo "/src/css/swiper-3.4.2.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/index.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.css\">
    <title>首页</title>
</head>
<body data-module=\"indexapp\">
<div class=\"layout\">
    <div class=\"top\">
        <p><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/myprofit")), "html", null, true);
        echo "\">今日收益(元)<i></i></a></p>
        <p>";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["my_profit"]) ? $context["my_profit"] : null), "html", null, true);
        echo "<i>**</i></p>
    </div>
    <div class=\"mid\">
        <ul class=\"clearfix\">
            <li><img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/daili_icon.png\" alt=\"\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/myagent")), "html", null, true);
        echo "\">我的代理</a><i>";
        echo twig_escape_filter($this->env, (isset($context["auth_num"]) ? $context["auth_num"] : null), "html", null, true);
        echo "</i></li>
            <li><img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/wanjia_icon.png\" alt=\"\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/myplayer")), "html", null, true);
        echo "\">我的玩家</a><i>";
        echo twig_escape_filter($this->env, (isset($context["game_user_num"]) ? $context["game_user_num"] : null), "html", null, true);
        echo "</i></li>

        </ul>
    </div>
    <div class=\"mynews\">
        <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/message_icon.png\" alt=\"\">我的消息
        <!--<i></i>-->
        <a href=\"#\"><img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/right.png\" alt=\"\"></a>
    </div>
    <div class=\"banner\">
        <div class=\"swiper-container\">
            <div class=\"swiper-wrapper\">
                <div class=\"swiper-slide\"><img src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index1.png\" alt=\"\"></div>
                <div class=\"swiper-slide\"><img src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index2.png\" alt=\"\"></div>
                <div class=\"swiper-slide\"><img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index3.png\" alt=\"\"></div>
            </div>
            <div class=\"swiper-pagination\"></div>
        </div>
    </div>
    <div class=\"indexNav clearfix\">
        <ul>
            <li><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/auth")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/shouquan_icon.png\" alt=\"\">授权代理</a></li>
            <li><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["share"]) ? $context["share"] : null), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/wanjia_icon.png\" alt=\"\">邀请玩家</a></li>
            <li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/client/index")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/kefu_icon.png\" alt=\"\">客服咨询</a></li>
            <li><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/mydata")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/mine_icon.png\" alt=\"\">我的</a></li>
        </ul>
    </div>
    <div class=\"flx\">
        <p>可提现金额(元)</p>
        <p>";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["can_money"]) ? $context["can_money"] : null), "html", null, true);
        echo "</p>
        <p class=\"exp\" id=\"exp\">收益到账说明</p>
        <!--";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/cash")), "html", null, true);
        echo "-->
        <a href=\"javascript:\" id=\"cash\">提现</a>
    </div>
</div>
</body>

<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/swiper-3.4.2.min.js\"></script>
<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/index.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 63,  164 => 62,  160 => 61,  156 => 60,  152 => 59,  143 => 53,  138 => 51,  128 => 46,  122 => 45,  116 => 44,  110 => 43,  100 => 36,  96 => 35,  92 => 34,  84 => 29,  79 => 27,  67 => 22,  59 => 21,  52 => 17,  48 => 16,  39 => 10,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/swiper-3.4.2.min.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/index.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.css">*/
/*     <title>首页</title>*/
/* </head>*/
/* <body data-module="indexapp">*/
/* <div class="layout">*/
/*     <div class="top">*/
/*         <p><a href="{{ url(['/default/myprofit']) }}">今日收益(元)<i></i></a></p>*/
/*         <p>{{ my_profit }}<i>**</i></p>*/
/*     </div>*/
/*     <div class="mid">*/
/*         <ul class="clearfix">*/
/*             <li><img src="{{ app.params.skinUrl }}/src/images/daili_icon.png" alt=""><a href="{{ url(['/default/myagent']) }}">我的代理</a><i>{{ auth_num }}</i></li>*/
/*             <li><img src="{{ app.params.skinUrl }}/src/images/wanjia_icon.png" alt=""><a href="{{ url(['/default/myplayer']) }}">我的玩家</a><i>{{ game_user_num }}</i></li>*/
/* */
/*         </ul>*/
/*     </div>*/
/*     <div class="mynews">*/
/*         <img src="{{ app.params.skinUrl }}/src/images/message_icon.png" alt="">我的消息*/
/*         <!--<i></i>-->*/
/*         <a href="#"><img src="{{ app.params.skinUrl }}/src/images/right.png" alt=""></a>*/
/*     </div>*/
/*     <div class="banner">*/
/*         <div class="swiper-container">*/
/*             <div class="swiper-wrapper">*/
/*                 <div class="swiper-slide"><img src="{{ app.params.skinUrl }}/src/images/index1.png" alt=""></div>*/
/*                 <div class="swiper-slide"><img src="{{ app.params.skinUrl }}/src/images/index2.png" alt=""></div>*/
/*                 <div class="swiper-slide"><img src="{{ app.params.skinUrl }}/src/images/index3.png" alt=""></div>*/
/*             </div>*/
/*             <div class="swiper-pagination"></div>*/
/*         </div>*/
/*     </div>*/
/*     <div class="indexNav clearfix">*/
/*         <ul>*/
/*             <li><a href="{{ url(['/default/auth']) }}"><img src="{{ app.params.skinUrl }}/src/images/shouquan_icon.png" alt="">授权代理</a></li>*/
/*             <li><a href="{{ share }}"><img src="{{ app.params.skinUrl }}/src/images/wanjia_icon.png" alt="">邀请玩家</a></li>*/
/*             <li><a href="{{ url(['/client/index']) }}"><img src="{{ app.params.skinUrl }}/src/images/kefu_icon.png" alt="">客服咨询</a></li>*/
/*             <li><a href="{{ url(['/default/mydata']) }}"><img src="{{ app.params.skinUrl }}/src/images/mine_icon.png" alt="">我的</a></li>*/
/*         </ul>*/
/*     </div>*/
/*     <div class="flx">*/
/*         <p>可提现金额(元)</p>*/
/*         <p>{{ can_money }}</p>*/
/*         <p class="exp" id="exp">收益到账说明</p>*/
/*         <!--{{ url(['/default/cash']) }}-->*/
/*         <a href="javascript:" id="cash">提现</a>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* */
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/swiper-3.4.2.min.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/index.js"></script>*/
/* </html>*/
