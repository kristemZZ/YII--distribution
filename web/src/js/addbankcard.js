window.onload=function(){
    var inputs= document.getElementsByTagName("input");
    var inputbox=document.getElementsByClassName("inputbox");
    var btn=document.getElementsByClassName("btn")[0];
    var bank = document.getElementById("bank");
    bank.addEventListener("tap", function() {
       var roadPick = new mui.PopPicker();//获取弹出列表组建，假如是二联则在括号里面加入{layer:2}
                 roadPick.setData([{//设置弹出列表的信息，假如是二联，还需要一个children属性
                     value: "1",
                     text: "中国建设银行"
                 }, {
                     value: "2",
                     text: "中国工商银行"
                 }, {
                    value: "3",
                    text: "中国农业银行"
                }, {
                    value: "4",
                    text: "中信银行"
                }, {
                    value: "5",
                    text: "交通银行"
                }, {
                    value: "6",
                    text: "长沙银行"
                }, {
                    value: "6",
                    text: "中国银行"
                }, {
                    value: "6",
                    text: "兴业银行"
                }, {
                    value: "6",
                    text: "光大银行"
                }, {
                    value: "6",
                    text: "民生银行"
                }, {
                    value: "6",
                    text: "华夏银行"
                }, {
                    value: "6",
                    text: "上海浦东银行"
                }, {
                    value: "6",
                    text: "广东发展银行"
                }]);
        roadPick.show(function(item) {//弹出列表并在里面写业务代码
                bank.value=item[0].text;
                var bool=true;
                for(var i=0;i<inputs.length;i++){
                    if(!(inputs[i].value)){
                       bool = false;
                    }
                }
                if(bool){
                    btn.classList.add("showBtn")
                }else{
                    btn.classList.remove("showBtn")
                }
                 });
             });
    //验证
    for(var i=0;i<inputs.length;i++){
       
        inputs[i].onblur=function(){
            if(!(this.value)){
                this.parentNode.classList.add("onred");
            }else{
                this.parentNode.classList.remove("onred");
            }
        }
        inputs[i].onkeyup=function(){
            var bool=true;
            for(var i=0;i<inputs.length;i++){
                if(!(inputs[i].value)){
                   bool = false;
                }
            }
            if(bool){
                btn.classList.add("showBtn")
            }else{
                btn.classList.remove("showBtn")
            }
        }
    }
    var bool=true;
    for(var i=0;i<inputs.length;i++){
        if(!(inputs[i].value)){
            bool = false;
        }
    }
    if(bool){
        btn.classList.add("showBtn")
    }else{
        btn.classList.remove("showBtn")
    }

    btn.onclick = function () {
        mui.confirm("确认消息无误，确定修改？","","",function(e){
            if(e.index){
                mui.post('/card/add',{
                        name:document.getElementById("name").value,
                        id_card:document.getElementById("id_card").value,
                        bank_name:document.getElementById("bank").value,
                        branch_name:document.getElementById("branch_name").value,
                        card_num:document.getElementById("card_num").value
                    },function(data){
                        if(!data.error){
                            window.location.href = data.url;
                        }else{
                            mui.alert('',data.message);
                        }
                    },'json'
                );
            }
        });
    }
}