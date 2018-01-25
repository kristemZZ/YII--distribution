window.onload=function(){
    var sures =document.getElementsByClassName("sure");
    for(var i = 0;i<sures.length;i++){
        sures[i].onclick=function(){
            this.classList.toggle("active");
            var obj = document.getElementsByClassName("active");
            // for (var p in obj){
            //     console.log(obj[p].getAttribute("gameid"));
            //     // str += obj[p].+',';
            // }
            var str = "";
            for(var i=0;i<obj.length;i++){
                str += obj[i].getAttribute('gameid')+",";
            }
            document.getElementById('game_ids').value = str;
        }
    }
    var sureBtn = document.getElementById('sureBtn');
    sureBtn.onclick=function(){
        var ids = document.getElementById('game_ids').value;
        mui.post('/default/auth',{
                id:ids
            },function(data){
                if(!data.error){
                    mui.toast('授权成功');
                    var timers =setTimeout(function() {
                            window.location.reload();
                        }
                        ,1000)
                }else{
                    mui.alert('',data.msg);
                }
            },'json'
        );

    }
    document.getElementById('search').onclick=function () {
        var id = document.getElementById("searchinfo").value;
        mui.post('/ajax/auth',{
                id:id
            },function(data){
                if(!data.error){
                    var text = '<li> <table> <tbody> <tr> <td width="50%"> <img src="'+data.user.url+'/src/images/index1.png" alt=""> <p>ID：'+data.user.game_id+'</p><p>'+data.user.nickname+'</p> </td> <td width="50%"> <i class="sure" gameid = "'+data.user.id+'"></i> </td> </tr> </tbody> </table> </li>';
                    document.getElementById('game_list').innerHTML = text;
                    var sures =document.getElementsByClassName("sure");
                    for(var i = 0;i<sures.length;i++){
                        sures[i].onclick=function(){
                            this.classList.toggle("active");
                            var str =  document.getElementById('game_ids').value+','+this.getAttribute('gameid');
                            document.getElementById('game_ids').value = str;

                        }
                    }
                }else{
                    mui.alert('',data.msg);
                }
            },'json'
        );
    }
}

