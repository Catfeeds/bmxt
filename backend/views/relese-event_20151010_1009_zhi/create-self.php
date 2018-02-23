<?php
/**
 * 文件名 : create-self.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: create-self.php  2015/8/28 $
*/
use yii\helpers\Html;

//var_dump($get);
//var_dump($fieldtype);
echo $id;
print_r($temp);
echo '</br>';
?>
<ul id="ajax_request_item">
    <?php
    foreach($temp as $val){

        echo '<li>'.$val['field_name'].'</li></br>';
    }
    ?>
</ul>

<input type="button" onclick="Show()" value="+">
<br/>
<input type="submit" value="保存">
<div id="additem" style="border: crimson 1px solid; display: none">
    <form id="add_item_form">
        <p>项目名：<input type="text" name="field_name"></p>
        <p>栏位类型：
            <select name="field_type">
                <?php
                foreach($fieldtype as $val){
                    echo '<option value="'.$val['id'].'">'.$val['type_name'].'</option>';
                    }
                ?>
            </select>
        </p>
        <p><input type="text" name="field_content"></p>
        <input type="hidden" value="<?php echo $id;?>" name="event_id">
        <input type="hidden" value="" name="releser">
        <input type="hidden" value="extends<?php echo $lenth+1;?>" name="extends_name">
        <input type="hidden" value="<?php echo Yii::$app->request->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
        <input type="button" value="保存" onclick="CreateItem()">
    </form>
</div>

<script type="text/javascript">


    function SetItem(id){
        var id = id;
        alert(id);
    }
    //控制自定义添加item的div
    function Show(){
        $("#additem").show();
    }

    function CreateItem(){
        $.ajax({
            url:"http://www.51first.cn/backend/web/index.php?r=relese-event/set-item",
            data:$('#add_item_form').serialize(),
            type:'post',
            success:function(data){
                alert(data);
                $("#additem").hide();
                //重新加载一次页面
                window.location.reload();
            }
        });
    }


</script>