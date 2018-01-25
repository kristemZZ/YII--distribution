$(function(){
    mui('.mui_scroll').scroll({
        deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
        scrollY: true, //是否竖向滚动
        scrollX: false, //是否横向滚动
    });
    var iconBtn = document.getElementById("iconBtn");
    var layout=document.getElementsByClassName("layout")[0];
    var mouth = document.getElementsByClassName("mouth")[0];
    iconBtn.addEventListener("click",function(e){
       e.stopPropagation();
       this.classList.toggle("down")
       mouth.classList.toggle("show")
    })
    layout.addEventListener("click",function(){
       if(mouth.classList.contains("show")){
           mouth.classList.remove("show");
           iconBtn.classList.remove("down");
        }
    });
    //tap栏切换
    $(".li_tap").click(function(){
        $(this).find("a").addClass("on");
        $(this).siblings().find("a").removeClass("on");
        $(".bgbox>div:eq("+$(this).index()+")").addClass("show").siblings().removeClass("show");
        var profit = document.getElementById('profit');
        document.getElementById('type').value = $(this).index()+'m';
        if($(this).index() == 0){
            document.getElementById('profit').innerHTML = document.getElementById('today').value;
        }else if($(this).index() == 1){
            document.getElementById('profit').innerHTML = document.getElementById('week').value;
        }else{
            document.getElementById('profit').innerHTML = document.getElementById('all').value;
        }
    });
    var uls = document.getElementById("uls");
    uls.addEventListener("click",function(e){
        $(".li_tap:eq(2)").find("a").addClass("on");
        $(".li_tap:eq(2)").siblings().find("a").removeClass("on");
        var month = e.target.getAttribute('month');
        document.getElementById("show_text").innerHTML = month+'月收益';
        $(".bgbox>div:eq(2)").addClass("show").siblings().removeClass("show");
        document.getElementById('type').value = month;
        mui.post('/ajax/myprofit',{
                month:month,
                sign:"auth"
            },function(data){
                if(data.e){
                    alert('还没有下级代理');
                }else{
                    var text = "";
                    for(var p in data.user){
                        text += '<a href="javascript:"> <table> <tbody><tr> <td width="10%">'+(parseInt(p)+1)+'</td> <td width="70%"><img src="'+(data.user[p].url)+'/src/images/index1.png" alt=""><p>ID：'+(data.user[p].game_id) +'</p><p>'+(data.user[p].nickname) +'</p> </td> <td width="20%">'+(data.user[p].to_me_profit)+'</td> </tr></tbody> </table></a>';
                    }
                    document.getElementById('profit').innerHTML = data.profit;
                    var li = document.getElementById('month');
                    li.innerHTML = text;
                }
            },'json'
        );
    });
    var search = document.getElementById('search');
    search.onclick=function(){
        var type = document.getElementById('type').value;
        mui.post('/ajax/searchauth',{
                type:type,
                game_id:document.getElementById('searchinfo').value
            },function(data){
                if(data.error){
                    alert(data.msg);
                }else{
                    var text = '';
                    text = '<a href="javascript:"> <table> <tbody><tr> <td width="10%">1</td> <td width="70%"><img src="'+(data.user.url)+'/src/images/index1.png" alt=""><p>ID：'+(data.user.game_id) +'</p><p>'+(data.user.nickname) +'</p> </td> <td width="20%">'+(data.user.to_me_profit)+'</td> </tr></tbody> </table></a>';
                    if( type == '0m'){
                        document.getElementById('today_1').innerHTML = text;
                    }else if(type == '1m'){
                        document.getElementById('week_1').innerHTML = text;
                    }else{
                        document.getElementById('month').innerHTML = text;
                    }
                }
            },'json'
        );
    }

});
   
   
