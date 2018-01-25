define([
    "picker",
    "ssx",
],function(){
    return{
        regiest:function(){
            //注册
            var getBtn = document.getElementById("getBtn");
            var countdown=60; 
            getBtn.onclick=function(){
                if(countdown!==60){
                    return
                }

                settime()
            }
            //倒计时函数
            function settime() { 
              
                if (countdown == 0) {  
                    clearInterval(timer);
                    getBtn.style.backgroundColor="#FFB107"
                    getBtn.innerText="获取验证码"; 
                    countdown = 60; 
                    return;
                } else { 
                    clearInterval(timer);
                    getBtn.style.backgroundColor="#ccc"
                    getBtn.innerText="重新发送(" + countdown + ")"; 
                    countdown--; 
                } 
            var timer =setTimeout(function() { 
                settime() }
                ,1000) 
            }
            
                //信息判断
        var playId=document.getElementById("playId");
        var sqrecord=document.getElementById("sqrecord");
        var phone =document.getElementById("phone");
        var code=document.getElementById("code");
        var sure=document.getElementById("sure");
        var password=document.getElementById("password");
        var loginBtn=document.getElementById("loginBtn");
        var zBox=document.getElementsByClassName(".zBox")[0];
        sure.onclick=function(){
            this.classList.toggle("active")
        }
        phone.onblur=function(){
           
            if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){
                this.value="";
                this.parentNode.classList.add("show")
               
            } 
        }
        code.onblur=function(){
            if(this.value.length<4 || this.value.length>4){
                this.value="";
                this.parentNode.classList.add("show")
               
            }
        }
        password.onblur=function(){
            if(this.value.length<6 || this.value.length>16){
                this.value="";
                this.parentNode.classList.add("show")
               
            }
        }
        playId.onblur=function(){
            if(this.value==""){
                this.value="";
                this.parentNode.classList.add("show")
               
            }
        }
        sqrecord.onblur=function(){
            if(this.value==""){
                this.value="";
                this.parentNode.classList.add("show")
               
            }
        }
        loginBtn.onclick=function(){
            if(playId.value==""){
                playId.value="";
                playId.parentNode.classList.add("show")
                return false; 
            }
            if(sqrecord.value==""){
                sqrecord.value="";
                sqrecord.parentNode.classList.add("show")
                return false; 
            }
            if(phone.value == ""){
                phone.parentNode.classList.add("show");
                code.parentNode.classList.add("show");
                return false;
            }
            if(code.value == ""){
                code.parentNode.classList.add("show")
                return false; 
            }
            if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone.value))){
                phone.value="";
                phone.parentNode.classList.add("show")
                password.parentNode.classList.add("show")
                return false; 
            } 
            if(code.value.length<4 || code.value.length>4){
                code.value="";
                code.parentNode.classList.add("show")
                return false; 
            }
            
            if(password.value==""){
                password.value="";
                password.parentNode.classList.add("show")
                return false; 
            }
            zBox.classList.add("show")  
         }
        
        },
        sqrecord:function(){
            //授权记录
        },
        txrecord:function(){
            //提现记录
            document.getElementsByClassName("layout")[0].style.height=window.innerHeight+"px";
        }
    }
})