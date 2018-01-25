window.onload=function(){
    document.getElementsByClassName("layout")[0].style.height=window.innerHeight+"px";
    
          document.getElementById('showAddress').addEventListener('tap',function () {
              
              var adressStr='';
              var add = new Array;
              var addressPicker=new mui.PopPicker({
                  layer:2//显示几层，我们要显示省、市、区，所以我们这里写三层，如果不写默认是一层
              });
              addressPicker.setData(cityData3);//city.data-3.js中的数据

              addressPicker.show(function(selectItems){
                  //将选择的省、市、区显示到屏幕上
                  for(var i=0;i<selectItems.length;i++){
                      // adressStr+=selectItems[i].text;
                      add[i] = selectItems[i].text;
                  }
                  document.getElementById('province').innerHTML=add[0];
                  document.getElementById('city').innerHTML=add[1];
                  mui.post('/default/mydata',{
                          province:add[0],
                          city:add[1],
                          birthday:document.getElementById('showYMD').innerHTML
                      },function(data){
                        if(data.error){
                            mui.alert('',data.msg);
                        }
                      },'json'
                  );
              });
          });

          //
          document.getElementById('showYMD').addEventListener('tap',function () {
                var datePicker=new mui.DtPicker({
                  type:'date',//若只显示年月日，类型为date，
                  beginDate:new Date(1955,01,01),//开始时间，即所显示的时间里，最早的年份日期
                });

                datePicker.show(function(selectItems){
                  //将选择的年月日显示到屏幕上
                  document.getElementById('showYMD').innerHTML=selectItems;
                    mui.post('/default/mydata',{
                            province:document.getElementById('province').innerHTML,
                            city:document.getElementById('city').innerHTML,
                            birthday:document.getElementById('showYMD').innerHTML
                        },function(data){
                            if(data.error){
                                mui.alert('',data.msg);
                            }
                        },'json'
                    );
                });
          })
}