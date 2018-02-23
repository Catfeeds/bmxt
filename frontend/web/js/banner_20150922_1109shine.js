window.onload=function () {
    var banner_index=document.getElementById("banner_index");
    var imgbox_banner=document.getElementById("imgbox_banner");
    var li_imgbox=imgbox_banner.getElementsByTagName("li");
    var img_imgbox=imgbox_banner.getElementsByTagName("img");
    var imgnav_banner=document.getElementById("imgnav_banner");
    var li_imgnav=imgnav_banner.getElementsByTagName("li");
//定义元素与元素集合

    var wid_1=window.screen.width;
    banner_index.style.maxWidth=wid_1-17+"px";
    banner_index.style.maxHeight=400*banner_index.offsetWidth/1600+"px";
    for (i=0;i<li_imgbox.length;i++){
        li_imgbox[i].style.maxWidth=wid_1-17+"px";

    };
//设置显示区域和图像大小

    var wid_2=document.body.scrollWidth;
    var wid_3=banner_index.offsetWidth;
    if(wid_3<wid_2){
        banner_index.style.left=wid_3-wid_2+"px";
    };
    var wid_4=li_imgnav[0].offsetWidth*li_imgnav.length
    imgnav_banner.style.left=(wid_3-wid_4)/2-15+"px";

//设置左偏




    alert(banner_index.offsetWidth);










    var imgbox_width=li_imgbox[0].offsetWidth*li_imgbox.length;
    imgbox_banner.style.width=imgbox_width+"px";
//定义图片集合的宽度


    var index_img=0;
    for (var i = 0; i <li_imgnav.length; i++) {
        li_imgnav[i].index=i;
        li_imgnav[i].onclick=function(){
            move_img(this.index);
            index_img=this.index;
//	alert(flag_click);
        }
    };
//定义数字导航点击事件


    function move_img(index){

        imgbox_banner.style.left=-li_imgbox[0].offsetWidth*index+"px";
        for(var n=0;n<li_imgnav.length;n++) {
            li_imgnav[n].className = "";
            li_imgnav[n].style.background = "white";
        }
        li_imgnav[index].className="active";
        li_imgnav[index].style.background="#4a86e8";
    }
//定义图片移动方法

    var timeInterval=2000;
    setInterval(change_img,timeInterval);
//启用定时器

    function change_img(){
        if (index_img==li_imgnav.length) {
            index_img=0;
            move_img(index_img);
            index_img+=1;
        }else{
            move_img(index_img);
            index_img+=1;
        };
    };
//定义图片更换函数
    alert(1);
}