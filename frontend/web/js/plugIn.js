window.onload = function () {
    toTop();
    banner();
};
window.onresize = function () {
    toTop();
    banner();
};
//»Øµ½¶¥²¿ shin_20151026
function toTop () {
    var browerWidth = document.documentElement.clientWidth ;
    var browerHeight = document.documentElement.clientHeight;
    var toTop_link = document.getElementById("toTop");
    toTop_link.style.left = browerWidth - toTop_link.offsetWidth + "px";
    toTop_link.style.top = (browerHeight - toTop_link.offsetHeight)/2 + "px";

    toTop_link.onclick = function () {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        return false;
    };
};
//Í¼ÏñÂÖ²¥ shin_20151027
function banner () {
    var flag = 0;
    var phpArray = document.getElementById("phpArray");
    var phpArrayLinks = phpArray.getElementsByTagName("a");
    var phpArrayImages = phpArray.getElementsByTagName("img");
    var bannerBox = document.getElementById("bannerBox");
    var bannerShadow = document.getElementById("bannerShadow");
    var browerWidth = window.innerWidth - 17;
    bannerBox.style.width = browerWidth + "px";
    bannerBox.style.height = browerWidth/4 + "px";
    bannerShadow.style.width = browerWidth + "px";
    bannerShadow.style.height = browerWidth/4 + "px";
    bannerBox.getElementsByTagName("img")[0].style.width = browerWidth + "px";
    bannerBox.getElementsByTagName("img")[0].style.height = browerWidth/4 + "px";
    var bannerNav = document.getElementById("bannerNav");
    var bannerNavLis = bannerNav.getElementsByTagName("li");
    bannerNav.style.left = (browerWidth-180)/2 - 60 + "px";
    bannerNav.style.top = browerWidth/4 - 40 + "px";

    bannerSlide();
    function bannerSlide () {
        if (flag == phpArrayImages.length) {
            flag = 0;
        };
        bannerBox.getElementsByTagName("a")[0].onclick = function () {
            document.location.href = phpArrayLinks[flag].href;
            return false;
        };
        bannerBox.getElementsByTagName("img")[0].src = phpArrayImages[flag].src;
        flag++;
        for (i = 0; i < bannerNavLis.length; i++) {
            bannerNavLis[i].style.backgroundColor = "";
        };
        bannerNavLis[flag].style.backgroundColor = "#1094fa";
        setTimeout(bannerSlide,3*1000);
    };
};

