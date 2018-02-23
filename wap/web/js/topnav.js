var top_=document.getElementById("w0");
var nav_=document.getElementById("w0-collapse");
var logo_=nav_.getElementsByTagName("img");

top_.style.background="#379BE9";
top_.style.border="0px";
nav_.style.background="#379BE9";
nav_.style.textAlign="left";

var ul_nav=document.getElementById("w1");
var li_nav=ul_nav.getElementsByTagName("li");
var a_nav=ul_nav.getElementsByTagName("a");

function opacity_a(index){
    for(a=0;a<a_nav.length;a++){
        if(a==index){
            a_nav[a].style.fontWeight="700";
        }else{
            a_nav[a].style.fontWeight="normal";
        };
    };
};

for(b=0;b<a_nav.length;b++){
    a_nav[b].index=b;
    a_nav[b].onmouseover=function(){
        opacity_a(this.index);
    };
    a_nav[b].onmouseout=function(){
        opacity_c();
    };
};

function opacity_c(){
    for(c=0;c<a_nav.length;c++){
        a_nav[c].style.fontWeight="normal";
    };
};









