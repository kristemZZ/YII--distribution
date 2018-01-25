
        //防止点透事件初始化
if ('addEventListener' in document) {  
    document.addEventListener('DOMContentLoaded', function() {  
        FastClick.attach(document.body);  
    }, false);  
}
    
   //rem适配
   var html = document.getElementsByTagName('html')[0];
   var width = window.innerWidth;
  
   if(width>750){
       width=750;
   }
   var fontSize = 100/750*width;
   html.style.fontSize = fontSize +'px';
   window.onresize = function(){
       var html = document.getElementsByTagName('html')[0];
       var width = window.innerWidth;
       if(width>750){
           width=750;
       }
       var fontSize = 100/750 * width;
       html.style.fontSize = fontSize +'px';
}

