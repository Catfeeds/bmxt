window.onload=function(){

    var infor=new Array();
    infor[0]=document.getElementById("detail_comp");
    infor[1]=document.getElementById("sign_comp");
    infor[2]=document.getElementById("result_comp");
    infor[3]=document.getElementById("saishi_gonggao");

    var nav_user=document.getElementById("nav_user");
    var li_nav=nav_user.getElementsByTagName("li");

    for(a=0;a<li_nav.length;a++){
        li_nav[a].index=a;
        li_nav[a].onclick=function(){
            display_b(this.index);
            display_c(this.index);
        };
    };


    function display_b(index_b) {
        for (b = 0; b < infor.length; b++) {
            if (b != index_b) {
                infor[b].style.display = "none";
            } else {
                infor[b].style.display = "block";
            };
        };
    };
    function display_c(index_c) {
        for (c = 0; c < li_nav.length; c++) {
            if (c != index_c) {
                li_nav[c].style.background = "#eeeeee";
                li_nav[c].style.color = "#FF6701";

            } else {
                li_nav[c].style.background = "seagreen";
                li_nav[c].style.color = "#ffffff";

            };
        };
    };
//以上为大标签切换
    var brief_btn1=document.getElementById("brief_btn1");
    brief_btn1.onclick=function(){
        display_b(1);
        display_c(1);
        window.scrollTo(0,350);
    };
 //   alert('success');
};




