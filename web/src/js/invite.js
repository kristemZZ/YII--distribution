$(function(){
    var phone_width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var phone_height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    document.getElementsByClassName("layout")[0].style.height=phone_height+"px";
    document.getElementsByClassName("mask")[0].style.height=phone_height+"px";
    document.getElementsByClassName("mask")[0].style.width=phone_width+"px";
    $("#file").click(function(){
        $(".mask").addClass("show")
    })
    var w=$("#view").width();
    var h=$("#view").height();
    $(".photo-clip-view").addClass("photoyview")
    $("#clipArea").photoClip({
        width:300,
        height: 300,
        file: "#file",
        view: "#view",
        ok: "#clipBtn",
        outputType: "png",
        strictSize: false,
        clipFinish: function(dataURL) {
            mui.post('/invitation/dataurl',{
                    url:dataURL
                },function(data){

                },'json'
            );
        }
    });
    $("#clipBtn").click(function(){
        $(".mask").removeClass("show")
    })
    $("#del").click(function(){
        $(".mask").removeClass("show")
    })
    //分享
    $("#share").click(function(){
        $(".sharebox").addClass("show")
    })
    $(".quxiao").click(function(){
        $(".sharebox").removeClass("show")
    })
})