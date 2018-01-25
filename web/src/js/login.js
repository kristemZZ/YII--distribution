window.onload=function(){
    var phone =document.getElementById("phone");
    var password=document.getElementById("password");
    var loginBtn=document.getElementById("loginBtn");
    phone.onblur=function(){
       
        if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){
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
    loginBtn.onclick=function(){
        if(phone.value == ""){
            phone.parentNode.classList.add("show");
            password.parentNode.classList.add("show");
            return false;
        }
        if(password.value == ""){
            password.parentNode.classList.add("show")
            return false; 
        }
        if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone.value))){
            phone.value="";
            phone.parentNode.classList.add("show")
            password.parentNode.classList.add("show")
            return false; 
        } 
        if(password.value.length<6 || password.value.length>16){
            password.value="";
            password.parentNode.classList.add("show")
            return false; 
        }
        mui.post('/passport/login',{
                username:phone.value,
                password:password.value
            },function(data){
                if(!data.error){
                    mui.toast('登录成功');
                    var timers =setTimeout(function() {
                            window.location.href = data.url;
                        }
                        ,1000)
                }else{
                    mui.alert('',data.message);
                }
            },'json'
        );
       
    }
}