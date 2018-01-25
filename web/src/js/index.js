window.onload=function(){
    document.getElementsByClassName("layout")[0].style.height=window.innerHeight+"px";
    var mySwiper = new Swiper('.swiper-container', {
    autoplay: 2000,//可选选项，自动滑动
    pagination: '.swiper-pagination',
    autoplayDisableOnInteraction : false,
    })
    var cash = document.getElementById('cash');
    cash.onclick=function(){
        mui.alert('','提现功能正在开发中。。。。');
    }
}