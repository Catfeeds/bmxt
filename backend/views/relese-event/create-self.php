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

?>
<div style="height: 100px;"></div>
<ul id="ajax_request_item">
    <?php
    foreach($temp as $val){

        echo '<li>'.$val['field_name'].'</li></br>';
    }
    ?>
</ul>

<input type="button" onclick="Show()" value="+">
<br/>

<div id="additem"  style=" display: none; width: 800px;" >
    <form id="add_item_form" class="form-horizontal">
        <div class="form_group">
            <label for="inputitem" class="col-sm-2 control-label">
                项目名
            </label>
            <div class="col-sm-10">
                <input type="text" name="field_name" class="form-control" placeholder="自定义选项名">
            </div>
        </div>

        <div class="form_group">
            <label for="inputtype" class="col-sm-2 control-label">
                栏位类型
            </label>
            <div class="col-sm-10">
                <select name="field_type" class="form-control">
                    <?php
                    foreach($fieldtype as $val){
                        echo '<option value="'.$val['id'].'">'.$val['type_name'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="from_group">
            <label for="inputsmall" class="col-sm-2 control-label">
                项目分选项
            </label>
            <div class="col-sm-10">
                <input type="text" name="field_content" class="form-control" placeholder="自定义选项名">
            </div>
        </div>
        <input type="hidden" value="<?php echo $id;?>" name="event_id">
        <input type="hidden" value="" name="releser">
        <input type="hidden" value="extends<?php echo $lenth+1;?>" name="extends_name">
        <input type="hidden" value="<?php echo Yii::$app->request->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
        <input class="btn btn-success" type="button" value="保存" onclick="CreateItem()">
    </form>
</div>

<blockquote>
    <p>使用说明：</p>
</blockquote>
<p>1、点击“+”，在“项目名”后输入项目名，比如：服装。</p>
<p>2、选择“栏位类型”，这里的栏位类型将设定报名页面的展示形式。比如：多选输入框，则报名者将可以选择多项自定义的选项。</p>
<p>3、选择“项目分选项”，则是定义项目名的内容，比如：项目名为服装，栏位类型选择单选按钮组，项目分选项可以设置为xl,xxl，xxxl,各选项之间请用半角逗号隔开。</p>
<p>4、设置完成，点击“保存”按钮。如需继续增加，请重复此过程！</p>

<a class="btn btn-success" href="http://www.51first.cn/frontend/web/index.php?r=site/content&id=<?php echo $id;?>">完成创建</a>

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