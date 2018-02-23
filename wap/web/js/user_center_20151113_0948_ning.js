window.onload=function(){
/*    var infor_user=document.getElementById("infor_user");
    var p_infor=infor_user.getElementsByTagName("p");

    for(i=0;i<p_infor.length;i++){
        p_infor[i].index=i;
        if(p_infor[i].index%2==0){
            p_infor[i].style.background="#eeeeee";
        }else{
            p_infor[i].style.background="";
        };
    };
//�����û���Ϣ��˫�е�p��ǩ����ɫ

    var span_infor=infor_user.getElementsByTagName("span");
    for(a=0;a<span_infor.length;a++){
        str_=span_infor[a].innerHTML;
        len_=str_.length;
        span_infor[a].style.letterSpacing=(70-len_*16)/len_+"px";
    };
//�����û���Ϣ��ǩ����
 */

    var infor=new Array();
    infor[0]=document.getElementById("infor_user");
    infor[1]=document.getElementById("infor_comp");
    infor[2]=document.getElementById("favor_comp");
    infor[3]=document.getElementById("teamList");
    infor[4]=document.getElementById("msgCenter");

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
                li_nav[c].style.color = "#aaaaaa";

            } else {
                li_nav[c].style.background = "#379BE9";
                li_nav[c].style.color = "#ffffff";


            };
        };
    };
//����Ϊ���ǩ�л�

    var infor_comp=document.getElementById("infor_comp");
    var ul_comp=infor_comp.getElementsByTagName("ul");
    var but_comp=infor_comp.getElementsByTagName("button")

    for(d=0;d<but_comp.length;d++){
        but_comp[d].index=d;
        but_comp[d].onclick=function(){
            display_e(this.index);
            display_f(this.index);
        };
    };

    function display_e(index_e) {
        for (e = 0; e < ul_comp.length; e++) {
            if (e != index_e) {
                ul_comp[e].style.display = "none";
            } else {
                ul_comp[e].style.display = "block";
            };
        };
    };

    function display_f(index_f) {
        for (f = 0; f < but_comp.length; f++) {
            if (f != index_f) {
                but_comp[f].style.background = "#f2f2f2";
                but_comp[f].style.color = "#888888";

            } else {
                but_comp[f].style.background = "#379BE9";
                but_comp[f].style.color = "#ffffff";
            };
        };
    };


  //  alert('success');
};




