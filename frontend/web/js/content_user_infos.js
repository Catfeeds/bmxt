/**
 * Created by Dawn.S on 2015/10/27.
 * @for Ajax_get_User_info
 */
function GetUserInfo(){
    $.ajax({
        url:"http://www.51first.cn/index.php?r=site/user-info",
        data:$('#get_ajax_info').serialize(),
        dataType:"json",
        type:'post',
        success:function(data){
            if(data.status !== 3){
                alert(data.info);
            }else{
                $("#applyinfo-bm_name").val(data.user_name);
                if(data.sex){
                    $("#applyinfo-sex input[value=1]").attr("checked",'checked');
                }else{
                    $("#applyinfo-sex input[value=0]").attr("checked",'checked');
                }
                $("#applyinfo-phone").val(data.phone);
                $("#applyinfo-email").val(data.email);
                $("#applyinfo-id_number").val(data.id_card);
            }
        },
        error:function(){
            alert("请重新填写");
        }
    });
}