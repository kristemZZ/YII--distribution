<?php

/* index.html */
class __TwigTemplate_da393d839d81040a5a667e7e45a5975446107661a2e670c81ededfc9970cad89 extends yii\twig\Template
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
<html>
<head>
    <title>swoole chat room</title>
    <meta charset=\"UTF-8\">
    <script type=\"text/javascript\">
        if(window.WebSocket){
            var webSocket = new WebSocket(\"ws://112.74.171.61:9502?id=";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "&name=";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\");
            webSocket.onopen = function (event) {
//                var id = \"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\";
//                var name = \"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\";
//                webSocket.send(\"#name#\"+id+\",\"+name);
            };
            webSocket.onmessage = function (event) {
                var content = document.getElementById('content');
                content.innerHTML = content.innerHTML.concat('<p style=\"margin-left:20px;height:20px;line-height:20px;\">'+event.data+'</p>');
            }

            var sendMessage = function(){
                var data = document.getElementById('message').value;
                webSocket.send(data);
                document.getElementById('message').value = \"\";
            }
        }else{
            console.log(\"您的浏览器不支持WebSocket\");
        }
    </script>
</head>
<body>
<div style=\"width:600px;margin:0 auto;border:1px solid #ccc;\">
    <div id=\"content\" style=\"overflow-y:auto;height:300px;\"></div>
    <hr/>
    <div style=\"height:40px\">
        <input type=\"text\" id=\"message\" style=\"margin-left:10px;height:25px;width:450px;\">
        <button onclick=\"sendMessage()\" style=\"height:28px;width:75px;\">发送</button>
    </div>
</div>
</body>
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
        return array (  39 => 11,  35 => 10,  28 => 8,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <title>swoole chat room</title>*/
/*     <meta charset="UTF-8">*/
/*     <script type="text/javascript">*/
/*         if(window.WebSocket){*/
/*             var webSocket = new WebSocket("ws://112.74.171.61:9502?id={{ id }}&name={{ name }}");*/
/*             webSocket.onopen = function (event) {*/
/* //                var id = "{{ id }}";*/
/* //                var name = "{{ name }}";*/
/* //                webSocket.send("#name#"+id+","+name);*/
/*             };*/
/*             webSocket.onmessage = function (event) {*/
/*                 var content = document.getElementById('content');*/
/*                 content.innerHTML = content.innerHTML.concat('<p style="margin-left:20px;height:20px;line-height:20px;">'+event.data+'</p>');*/
/*             }*/
/* */
/*             var sendMessage = function(){*/
/*                 var data = document.getElementById('message').value;*/
/*                 webSocket.send(data);*/
/*                 document.getElementById('message').value = "";*/
/*             }*/
/*         }else{*/
/*             console.log("您的浏览器不支持WebSocket");*/
/*         }*/
/*     </script>*/
/* </head>*/
/* <body>*/
/* <div style="width:600px;margin:0 auto;border:1px solid #ccc;">*/
/*     <div id="content" style="overflow-y:auto;height:300px;"></div>*/
/*     <hr/>*/
/*     <div style="height:40px">*/
/*         <input type="text" id="message" style="margin-left:10px;height:25px;width:450px;">*/
/*         <button onclick="sendMessage()" style="height:28px;width:75px;">发送</button>*/
/*     </div>*/
/* </div>*/
/* </body>*/
/* </html>*/
