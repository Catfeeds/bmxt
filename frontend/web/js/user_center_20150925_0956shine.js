/**
 * Created by Administrator on 2015/9/1.
 */
$(document).ready(function() {
    $("#a_index").mouseenter(function () {
        $("#a_index").css("background-color", "#2077BB");
    });
    $("#a_index").mouseleave(function () {
        $("#a_index").css("background-color", "#379BE9");
    });

    $("#box_user1").mouseenter(function () {
        $("#box_user1").css({'background-color':'#2077BB'});
        $("#box_user2").css({"display":"block"});
        $("#box_user3").css({"display":"block"});
    });
    $("#box_user1").mouseleave(function () {
        $("#box_user1").css("background-color", "#379BE9");
        $("#box_user2").css({"display":"none"});
        $("#box_user3").css({"display":"none"});
    });
    $("#box_user2").mouseenter(function () {
        $("#box_user2").css({"display":"block",'background-color':'#2077BB'});
        $("#box_user3").css({"display":"block"});
    });
    $("#box_user2").mouseleave(function () {
        $("#box_user2").css({"display":"none",'background-color':'#379BE9'});
        $("#box_user3").css({"display":"none"});
    });
    $("#box_user3").mouseenter(function () {
        $("#box_user3").css({"display":"block",'background-color':'#2077BB'});
        $("#box_user2").css({"display":"block"});
    });
    $("#box_user3").mouseleave(function () {
        $("#box_user3").css({"display":"none",'background-color':'#379BE9'});
        $("#box_user2").css({"display":"none"});
    });

    $("#box_info1").mouseenter(function () {
        $("#box_info1").css({'background-color':'#2077BB'});
        $("#box_info2").css({"display":"block"});
        $("#box_info3").css({"display":"block"});
    });
    $("#box_info1").mouseleave(function () {
        $("#box_info1").css("background-color", "#379BE9");
        $("#box_info2").css({"display":"none"});
        $("#box_info3").css({"display":"none"});
    });
    $("#box_info2").mouseenter(function () {
        $("#box_info2").css({"display":"block",'background-color':'#2077BB'});
        $("#box_info3").css({"display":"block"});
    });
    $("#box_info2").mouseleave(function () {
        $("#box_info2").css({"display":"none",'background-color':'#379BE9'});
        $("#box_info3").css({"display":"none"});
    });
    $("#box_info3").mouseenter(function () {
        $("#box_info3").css({"display":"block",'background-color':'#2077BB'});
        $("#box_info2").css({"display":"block"});
    });
    $("#box_info3").mouseleave(function () {
        $("#box_info3").css({"display":"none",'background-color':'#379BE9'});
        $("#box_info2").css({"display":"none"});
    });

//以上为头部

    var abc='#user_data';
    $("#main_l1").click(function () {
        $("#user_data").css({"display":"block"});
        $("#comptt").css({"display":"none"});
        $("#favor").css({"display":"none"});
    });
    $("#main_l2").click(function () {
        $("#user_data").css({"display":"none"});
        $("#comptt").css({"display":"block"});
        $("#favor").css({"display":"none"});
    });
    $("#main_l3").click(function () {
        $("#user_data").css({"display":"none"});
        $("#comptt").css({"display":"none"});
        $("#favor").css({"display":"block"});
    });

    //以下是赛事分类
    $("#selector1").click(function () {
        $("#inprogress").css({"display":"block"});
        $("#ended").css({"display":"none"});
    });
    $("#selector2").click(function () {
        $("#inprogress").css({"display":"none"});
        $("#ended").css({"display":"block"});
    });
})


