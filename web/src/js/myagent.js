window.onload=function(){
    mui('.mui_scroll').scroll({
        deceleration: 0.0005, //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
        scrollY: true, //是否竖向滚动
        scrollX: false, //是否横向滚动
    });
    var layout=document.getElementsByClassName("layout")[0];
    var timeCh = document.getElementById("timeCh");
    var sj = document.getElementById("sj");
    var uls = document.getElementById("uls");
    var mouth = document.getElementsByClassName("mouth")[0];
    timeCh.addEventListener("click",function(e){
       e.stopPropagation();
       sj.classList.toggle("down");
       mouth.classList.toggle("show");
    })
    layout.addEventListener("click",function(){
       if(mouth.classList.contains("show")){
           mouth.classList.remove("show");
           sj.classList.remove("down");
        }
    })
    uls.addEventListener("click",function(e){
        var month = e.target.getAttribute('m');
        document.getElementById('type').value = month;
        var sign = document.getElementById('sign').value;
        document.getElementById('timeCh').innerHTML = month+'月收益<i id="sj"></i>';
        var sign = document.getElementById('sign').value;
        mui.post('/ajax/myprofit',{
                month:month,
                sign:sign
            },function(data){
                if(data.e){
                    alert('还没有下级代理');
                }else{
                    var text = '';
                    if(data.e !=0){
                        for(var p in data.user){
                            text += '<a href="javascript:"> <table> <tbody><tr> <td width="10%">'+(parseInt(p)+1)+'</td> <td width="70%"><img src="'+(data.user[p].url)+'/src/images/index1.png" alt=""><p>ID：'+(data.user[p].game_id) +'</p><p>'+(data.user[p].nickname) +'['+(data.user[p].level_text)+']</p> </td> <td width="20%">'+(data.user[p].to_me_profit)+'<p>'+(data.user[p].all_profit)+'</p></td> </tr></tbody> </table></a>';
                        }
                    }else{
                        for(var p in data.user){
                            text += '<a href="javascript:"> <table> <tbody><tr> <td width="10%">'+(parseInt(p)+1)+'</td> <td width="70%"><img src="'+(data.user[p].url)+'/src/images/index1.png" alt=""><p>ID：'+(data.user[p].game_id) +'</p><p>'+(data.user[p].nickname) +'</p> </td> <td width="20%">'+(data.user[p].to_me_profit)+'</td> </tr></tbody> </table></a>';
                        }
                    }

                    var li = document.getElementById('auth_list');
                    li.innerHTML = text;
                }
            },'json'
        );
    })
    document.getElementById("search").onclick=function () {
        var type = document.getElementById("type").value;
        var info = document.getElementById("searchinfo").value;
        var sign = document.getElementById('sign').value;
        mui.post('/ajax/searchauth',{
                type:type,
                game_id:document.getElementById('searchinfo').value,
                sign:sign
            },function(data){
                if(data.error){
                    alert(data.msg);
                }else{
                    var text = '';
                    if(data.sign !=0){
                        text = '<a href="javascript:"> <table> <tbody><tr> <td width="10%">1</td> <td width="70%"><img src="'+(data.user.url)+'/src/images/index1.png" alt=""><p>ID：'+(data.user.game_id) +'</p><p>'+(data.user.nickname) +'['+(data.user.text_level) +']</p> </td> <td width="20%">'+(data.user.to_me_profit)+'<p>'+(data.user.all_profit)+'</p></td> </tr></tbody> </table></a>';
                    }else{
                        text += '<a href="javascript:"> <table> <tbody><tr> <td width="10%">1</td> <td width="70%"><img src="'+(data.user.url)+'/src/images/index1.png" alt=""><p>ID：'+(data.user.game_id) +'</p><p>'+(data.user.nickname) +'</p> </td> <td width="20%">'+(data.user.to_me_profit)+'</td> </tr></tbody> </table></a>';
                    }
                    document.getElementById('auth_list').innerHTML = text;
                }
            },'json'
        );
    }
}