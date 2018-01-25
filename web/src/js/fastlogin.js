window.onload=function(){
    var getBtn = document.getElementById("getBtn");
    var countdown=60; 
    getBtn.onclick=function(){
       
        if(countdown!==60){
            return
        }
        var cod='';
        var phone =document.getElementById("phone");
        var codeLength = 4;//验证码长度
        //产生验证码
        for (var i = 0; i < codeLength; i++) {
            cod += parseInt(Math.random() * 9).toString();
        }
        if((/^1(3|4|5|7|8)\d{9}$/.test(phone.value))){
            //发送验证码
            mui.post('/passport/sendcode',{
                    phone:phone.value,
                    code:cod
                },function(data){
                    if(!data.error){
                        settime();
                    }else{
                        mui.alert('',data.msg);
                    }
                },'json'
            );
        }else{
            mui.alert('请输入正确的手机号码');
        }
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
   
var phone =document.getElementById("phone");
var code=document.getElementById("code");
var loginBtn=document.getElementById("loginBtn");
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
loginBtn.onclick=function(){
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
    mui.post('/passport/fastlogin',{
            username:phone.value,
            password:code.value
        },function(data){
            if(!data.error){
                //登录成功
                window.location.href = data.url;
            }else{
                //失败提示错误
                mui.alert('',data.message);
            }
        },'json'
    );
}
}