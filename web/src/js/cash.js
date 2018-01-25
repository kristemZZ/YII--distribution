window.onload=function(){
     //提现金额
     document.getElementsByClassName("layout")[0].style.height=window.innerHeight+"px";
     var cash=document.getElementById("cash");
     var cashBtn=document.getElementById("cashBtn");
     var cashMoney=document.getElementById("cashMoney");
     var ts =document.getElementsByClassName("ts")[0];
     cashBtn.addEventListener("click",function(){
            cashMoney.value=cash.innerText;
     })
     cashMoney.addEventListener("keyup",function(){
         var cash1 = parseFloat(cash.innerText);
        var cash2 =parseFloat(this.value);
        if(cash2>cash1){
            ts.classList.add("show")
        }else{
            ts.classList.remove("show")
        }
     })
}