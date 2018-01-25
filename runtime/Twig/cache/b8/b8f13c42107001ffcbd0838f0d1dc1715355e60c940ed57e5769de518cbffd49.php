<?php

/* login.html */
class __TwigTemplate_36bae2cebbae40a9cb3e59590f49684d85dc4f4af7bf63a3f3622d76bbbb7401 extends yii\twig\Template
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
        echo "\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">

    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/base.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/login.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/css/lib/mui/mui.css\">
    <title>账户登录</title>
</head>
<body data-module=\"login\">
<div class=\"layout\">
    <div class=\"head\">
        <p>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "name", array()), "html", null, true);
        echo "</p>
        <p>发掘更有价值的自己</p>
    </div>
        <div class=\"form\">

            <input type=\"hidden\" id=\"getBtn\">
            <div class=\"inputBox\"><input type=\"text\" class=\"form-common\" name=\"LoginForm[username]\" placeholder=\"请输入手机号\" name=\"phone\" id=\"phone\"></div>
            <div class=\"inputBox\"> <input type=\"password\" class=\"form-common\" name=\"LoginForm[password]\" placeholder=\"请输入6-16位密码\" name=\"password\" id=\"password\"> </div>

        </div>
        <div class=\"login-nav\">
            <ul>
                <li><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/passport/register")), "html", null, true);
        echo "\">注册代理</a></li>
                <li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/passport/findpwd")), "html", null, true);
        echo "\">忘记密码</a></li>
                <li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/passport/fastlogin")), "html", null, true);
        echo "\">快速登陆</a></li>
            </ul>
        </div>
        <div class=\"btnBox\">
            <i  class=\"loginBtn\" id=\"loginBtn\">登录</i>
        </div>
</div>
</body>
<script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/login.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 41,  90 => 40,  86 => 39,  82 => 38,  71 => 30,  67 => 29,  63 => 28,  48 => 16,  39 => 10,  35 => 9,  31 => 8,  22 => 2,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="{{ app.language}}">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/* */
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/login.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/lib/mui/mui.css">*/
/*     <title>账户登录</title>*/
/* </head>*/
/* <body data-module="login">*/
/* <div class="layout">*/
/*     <div class="head">*/
/*         <p>{{app.name}}</p>*/
/*         <p>发掘更有价值的自己</p>*/
/*     </div>*/
/*         <div class="form">*/
/* */
/*             <input type="hidden" id="getBtn">*/
/*             <div class="inputBox"><input type="text" class="form-common" name="LoginForm[username]" placeholder="请输入手机号" name="phone" id="phone"></div>*/
/*             <div class="inputBox"> <input type="password" class="form-common" name="LoginForm[password]" placeholder="请输入6-16位密码" name="password" id="password"> </div>*/
/* */
/*         </div>*/
/*         <div class="login-nav">*/
/*             <ul>*/
/*                 <li><a href="{{ url(['/passport/register']) }}">注册代理</a></li>*/
/*                 <li><a href="{{ url(['/passport/findpwd']) }}">忘记密码</a></li>*/
/*                 <li><a href="{{ url(['/passport/fastlogin']) }}">快速登陆</a></li>*/
/*             </ul>*/
/*         </div>*/
/*         <div class="btnBox">*/
/*             <i  class="loginBtn" id="loginBtn">登录</i>*/
/*         </div>*/
/* </div>*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/login.js"></script>*/
/* </html>*/
