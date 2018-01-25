require.config({
    baseUrl: '../../src/js',
    paths:{
        "fastclick":"tool/fastclick",//移动端点透处理
        "swiper":"tool/swiper-3.4.2.min",//滑动
        "ssx":"lib/mui/city.data-3",//省市县数据
        "mui":"lib/mui/mui",
        "dtpicker":"lib/mui/mui.dtpicker",
        "picker":"lib/mui/mui.picker",
        "poppicker":"lib/mui/mui.poppicker",
        "base":"base"
    },
});

var myModult=document.getElementsByTagName("body")[0].getAttribute("data-module");
require(["app"],function(md){
      md[""+myModult+""]()
});
