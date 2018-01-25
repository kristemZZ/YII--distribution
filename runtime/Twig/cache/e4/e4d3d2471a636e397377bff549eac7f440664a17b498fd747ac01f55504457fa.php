<?php

/* index.html */
class __TwigTemplate_313fdf19ec45126510be38c440e15dfe9efb66ad6e84db790b2617672580c48d extends yii\twig\Template
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
        echo "/src/css/invite.css\">
    <title>邀请玩家</title>
</head>
<body>
<div class=\"layout\">
    <div class=\"top\">
        <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('yii2-twig')->url(array(0 => "/default/index")), "html", null, true);
        echo "\">返回</a>
        邀请玩家
        <!-- <i id=\"share\">分享</i> -->
    </div>
    <div class=\"manzi_logo\">

    </div>
    <div class=\"show_box\">

    </div>
    <div class=\"message\">
        <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/images/index4.png\" alt=\"\"><br>
        <p>ID：";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "game_id", array()), "html", null, true);
        echo "</p><br>
        <div class=\"erweima img-container\" id=\"view\" style=\"background:url('";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "')\">

        </div>
        <i>点击添加个人二维码</i>
        <div class=\"bottom_img\">
            <p>零风险&nbsp&nbsp&nbsp零投入</p>
            <p>首月入保底<i>5000-15000</i></p>
            <p>赶快跟我一起做蛮子吧</p>
        </div>
        <input type=\"file\" name=\"\" id=\"file\" class=\"myfile\">
    </div>
</div>

<!-- 图片截取层 -->
<div class=\"mask\" id=\"clipArea\">
    <a href=\"javascript:;\" id=\"del\">取消</a>
    <a href=\"javascript:;\" id=\"clipBtn\">截取</a>
</div>
<!-- 微信分享层 -->
<!-- <div class=\"sharebox\" id=\"sharebox\">
        <div class=\"mybox\">
                <div class=\"top\">
                        <ul>
                            <li>分享到</li>
                            <li class=\"quxiao\">取消</li>
                        </ul>
                    </div>

                  <a href=\"javascript:;\"> <i></i><p>微信好友</p></a>
                  <a href=\"javascript:;\"> <i></i><p>朋友圈</p></a>
        </div>
</div> -->
<input type=\"hidden\" name=\"\" id=\"wh\">
</body>
<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/base.js\"></script>
<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/lib/mui/mui.js\"></script>
<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/fastclick.js\"></script>
<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/jquery-2.1.1.min.js\"></script>
<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/hammer.js\"></script>
<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/iscroll-zoom.js\"></script>
<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/tool/jquery.photoClip.js\"></script>
<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "params", array()), "skinUrl", array()), "html", null, true);
        echo "/src/js/invite.js\"></script>
<script src=\"http://res.wx.qq.com/open/js/jweixin-1.2.0.js\" ></script>
<script>
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: \"";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "appId", array()), "html", null, true);
        echo "\", // 必填，公众号的唯一标识
        timestamp: \"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "timestamp", array()), "html", null, true);
        echo "\", // 必填，生成签名的时间戳
        nonceStr: \"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "nonceStr", array()), "html", null, true);
        echo "\", // 必填，生成签名的随机串
        signature: \"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "signature", array()), "html", null, true);
        echo "\",// 必填，签名，见附录1
        jsApiList: [\"onMenuShareTimeline\",\"onMenuShareAppMessage\"] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    wx.ready(function () {
        var shareData = {
            title: '这是一个测试', // 分享标题
            desc: '这是一个测试', // 分享描述
            link: \"";
        // line 84
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
        echo "\", // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: \"";
        // line 85
        echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
        echo "\", // 分享图标
        };
        wx.onMenuShareTimeline(shareData);
        wx.onMenuShareAppMessage(shareData);
    });

</script>


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
        return array (  162 => 85,  158 => 84,  147 => 76,  143 => 75,  139 => 74,  135 => 73,  127 => 68,  123 => 67,  119 => 66,  115 => 65,  111 => 64,  107 => 63,  103 => 62,  99 => 61,  62 => 27,  58 => 26,  54 => 25,  40 => 14,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <meta http-equiv="X-UA-Compatible" content="ie=edge">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/base.css">*/
/*     <link rel="stylesheet" href="{{ app.params.skinUrl }}/src/css/invite.css">*/
/*     <title>邀请玩家</title>*/
/* </head>*/
/* <body>*/
/* <div class="layout">*/
/*     <div class="top">*/
/*         <a href="{{ url(['/default/index']) }}">返回</a>*/
/*         邀请玩家*/
/*         <!-- <i id="share">分享</i> -->*/
/*     </div>*/
/*     <div class="manzi_logo">*/
/* */
/*     </div>*/
/*     <div class="show_box">*/
/* */
/*     </div>*/
/*     <div class="message">*/
/*         <img src="{{ app.params.skinUrl }}/src/images/index4.png" alt=""><br>*/
/*         <p>ID：{{ user.game_id }}</p><br>*/
/*         <div class="erweima img-container" id="view" style="background:url('{{ url }}')">*/
/* */
/*         </div>*/
/*         <i>点击添加个人二维码</i>*/
/*         <div class="bottom_img">*/
/*             <p>零风险&nbsp&nbsp&nbsp零投入</p>*/
/*             <p>首月入保底<i>5000-15000</i></p>*/
/*             <p>赶快跟我一起做蛮子吧</p>*/
/*         </div>*/
/*         <input type="file" name="" id="file" class="myfile">*/
/*     </div>*/
/* </div>*/
/* */
/* <!-- 图片截取层 -->*/
/* <div class="mask" id="clipArea">*/
/*     <a href="javascript:;" id="del">取消</a>*/
/*     <a href="javascript:;" id="clipBtn">截取</a>*/
/* </div>*/
/* <!-- 微信分享层 -->*/
/* <!-- <div class="sharebox" id="sharebox">*/
/*         <div class="mybox">*/
/*                 <div class="top">*/
/*                         <ul>*/
/*                             <li>分享到</li>*/
/*                             <li class="quxiao">取消</li>*/
/*                         </ul>*/
/*                     </div>*/
/* */
/*                   <a href="javascript:;"> <i></i><p>微信好友</p></a>*/
/*                   <a href="javascript:;"> <i></i><p>朋友圈</p></a>*/
/*         </div>*/
/* </div> -->*/
/* <input type="hidden" name="" id="wh">*/
/* </body>*/
/* <script src="{{ app.params.skinUrl }}/src/js/base.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/lib/mui/mui.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/fastclick.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/jquery-2.1.1.min.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/hammer.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/iscroll-zoom.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/tool/jquery.photoClip.js"></script>*/
/* <script src="{{ app.params.skinUrl }}/src/js/invite.js"></script>*/
/* <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" ></script>*/
/* <script>*/
/*     wx.config({*/
/*         debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。*/
/*         appId: "{{ config.appId }}", // 必填，公众号的唯一标识*/
/*         timestamp: "{{ config.timestamp }}", // 必填，生成签名的时间戳*/
/*         nonceStr: "{{ config.nonceStr }}", // 必填，生成签名的随机串*/
/*         signature: "{{ config.signature }}",// 必填，签名，见附录1*/
/*         jsApiList: ["onMenuShareTimeline","onMenuShareAppMessage"] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2*/
/*     });*/
/* */
/*     wx.ready(function () {*/
/*         var shareData = {*/
/*             title: '这是一个测试', // 分享标题*/
/*             desc: '这是一个测试', // 分享描述*/
/*             link: "{{ link }}", // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致*/
/*             imgUrl: "{{ img }}", // 分享图标*/
/*         };*/
/*         wx.onMenuShareTimeline(shareData);*/
/*         wx.onMenuShareAppMessage(shareData);*/
/*     });*/
/* */
/* </script>*/
/* */
/* */
/* </html>*/
