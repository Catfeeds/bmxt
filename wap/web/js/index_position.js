/**
 * Created by Administrator on 2015/10/13.
 */
var slt_all=document.getElementById("slt_all");
var all_a=slt_all.getElementsByTagName("a");
var slt_list=document.getElementById("slt_list");
var list_a=slt_list.getElementsByTagName("a");

var flag_all=0;
all_a[0].onclick=function() {
    if (flag_all==0) {
        flag_all=1;
        for(i=0; i<list_a.length; i++){
            flag_[i]=0;
        };
        for (i=0; i<list_a.length; i++) {
            list_a[i].style.background = "#2e8b57";
            list_a[i].style.color = "#ffffff";
        };
        all_a[0].style.background = "#ffffff";
        all_a[0].style.color = "#2e8b57";
    }else{
        flag_all=0;
        for (i = 0; i < list_a.length; i++) {
            list_a[i].style.background = "#2e8b57";
            list_a[i].style.color = "#ffffff";
        };
        all_a[0].style.background = "#2e8b57";
        all_a[0].style.color = "#ffffff";
    };
    return false;
};

var flag_= new Array;
for(i=0; i<list_a.length; i++){
    flag_[i]=0;
};

for(i=0; i<list_a.length; i++){
    list_a[i].index=i;
    list_a[i].onclick= function () {
        if (flag_all==0 && flag_[this.index]==0) {
            flag_[this.index]=1;
            this.style.background = "#ffffff";
            this.style.color = "#2e8b57";
        }else if(flag_all==0 && flag_[this.index]==1){
            flag_[this.index]=0;
            this.style.background = "#2e8b57";
            this.style.color = "#ffffff";
        }else{
            flag_all=0;
            flag_[this.index]=1;
            all_a[0].style.background = "#2e8b57";
            all_a[0].style.color = "#ffffff";
            this.style.background = "#ffffff";
            this.style.color = "#2e8b57";
        };
        return false;
    };
};
