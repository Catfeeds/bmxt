window.onload=function(){

    var infor=new Array();
    infor[0]=document.getElementById("detail_comp");
    infor[1]=document.getElementById("sign_comp");

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
            } else {
                li_nav[c].style.background = "seagreen";

            };
        };
    };
//以上为大标签切换



 //   alert('success');
};




