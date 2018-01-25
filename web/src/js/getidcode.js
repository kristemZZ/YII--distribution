window.onload=function(){
    var getBtn = document.getElementById("getBtn");
    var code = document.getElementById("code");
    var next=document.getElementsByClassName("next")[0];
    var password=document.getElementById("password");
    var loginBtn=document.getElementById("loginBtn");
    var passwordt=document.getElementById("passwordt");
    var countdown=60; 
        settime();
        getBtn.onclick=function(){
            if(countdown!==60){
                return
            }
            var code='';
            var phone =document.getElementById("phone");
            var codeLength = 4;//验证码长度
            //产生验证码
            for (var i = 0; i < codeLength; i++) {
                code += parseInt(Math.random() * 9).toString();
            }
            //发送验证码
            mui.post('/passport/sendcode',{
                    phone:phone.value,
                    code:code
                },function(data){
                    if(!data.error){
                        settime();
                    }else{
                        mui.alert('',data.msg);
                    }
                },'json'
            );
        };
        next.onclick=function(){
            if(code.value == ""){
                code.parentNode.classList.add("show")
                return false; 
            }
            var str = code.value;
            mui.post('/card/next',{
                    code:str
                },function(data){
                    if(!data.error){
                        window.location.href = data.url;
                    }else{
                        mui.alert('',data.message);
                    }
                },'json'
            );
        }
        code.onblur=function(){
            if(this.value.length<4 || this.value.length>4){
                this.value="";
                this.parentNode.classList.add("show")
               
            }
        }
        //
        password.onblur=function(){
            if(this.value.length<6 || this.value.length>16){
                this.value="";
                this.parentNode.classList.add("show")
               
            }
          }
          passwordt.onblur=function(){
            if(!(this.value==password.value)){
                this.value="";
                this.parentNode.classList.add("show")
                return false;
            }
          };
          loginBtn.onclick=function(){
            if(code.value.length<4 || code.value.length>4){
                code.value="";
                code.parentNode.classList.add("show")
                return false; 
            }
            if(password.value==""){
                password.value="";
                password.parentNode.classList.add("show")
                passwordt.parentNode.classList.add("show")
                return false; 
            }
            if(!(passwordt.value==password.value)){
                passwordt.value="";
                passwordt.parentNode.classList.add("show")
                return false; 
            }
              mui.post('/passport/findpwd',{
                      phone:document.getElementById("phone").value,
                      code:document.getElementById("code").value,
                      password:document.getElementById("password").value,
                      passwords:document.getElementById("passwordt").value,
                  },function(data){
                      if(!data.error){
                          //注册成功
                          mui.toast('密码修改成功');
                          var timers =setTimeout(function() {
                                  window.location.href = data.url;
                              }
                              ,1000)
                      }else{
                          //失败提示错误
                          mui.alert('',data.message);
                      }
                  },'json'
              );
           
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
              getBtn.innerText=""+ countdown +"秒后重发"; 
              countdown--; 
          } 
      var timer =setTimeout(function() { 
          settime() }
          ,1000) 
      }
}