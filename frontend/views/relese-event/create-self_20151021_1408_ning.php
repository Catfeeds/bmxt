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

$cssString="
    body{
        background:url(/frontend/web/images/multi_back.png) no-repeat ;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
    }
    .form-control{
        margin-bottom:10px;
    }
    .container{
        width:60%;
    }
    .form_group{
        width:100%;
    }
";
$this->registerCss($cssString);
?>
<div class="containor" style="height: 50px"></div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>序号</th>
            <th>自定义项目名</th>
            <th>二级属性</th>
        </tr>
    </thead>
    <?php foreach($temp as $key => $val){?>
    <tr><td><?php echo ($key+1);?></td>
        <td><input class="form-control" value="<?php echo $val['field_name'];?>" name=""/></td>
        <td><input class="form-control" value="" name=""/></td>
    </tr>
    <?php }?>

</table>




<button class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
    预览
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">预览</h4>
            </div>
            <div class="modal-body">
                <?php
                echo $field;
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>

    </div>

</div>







<h2>请在此页面完成自定义报名项添加</h2>
<input type="button" onclick="Show()" value="+" style="margin-bottom:15px;"><span>&nbsp;&nbsp;&nbsp;&nbsp;点击“+”添加自定义报名项</span>
<br/>

<div id="additem"  style=" display: none; width: 100%;" >
    <form id="add_item_form" class="form-horizontal">
        <div class="form_group">
            <label for="inputitem" class="col-sm-2 control-label">
                自定义项名称
            </label>
            <div class="col-sm-10">
                <input type="text" name="field_name" class="form-control" placeholder="自定义选项名">
            </div>
        </div>

        <div class="form_group">
            <label for="inputtype" class="col-sm-2 control-label">
                显示样式
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
                报名者可选值
            </label>
            <div class="col-sm-10">
                <input type="text" name="field_content" class="form-control" placeholder="自定义选项名">
            </div>
        </div>
        <input type="hidden" value="<?php echo $id;?>" name="event_id">
        <input type="hidden" value="" name="releser">
        <input type="hidden" value="extends<?php echo $lenth+1;?>" name="extends_name">
        <input type="hidden" value="<?php echo Yii::$app->request->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
        <input class="btn btn-success" type="button" value="保存" onclick="CreateItem()" style="float: right; margin: 15px;">
    </form>
</div>
<div style="clear: both;"></div>
<blockquote>
    <p>使用说明：</p>
</blockquote>
<p>1、点击“+”，在“自定义项名称”后输入项目名，比如：服装。</p>
<p>2、选择“显示样式”，这里的栏位类型将设定报名页面的展示形式。比如：多选输入框，则报名者将可以选择多个选项。</p>
<p>3、选择“报名者可选值”，则是定义该报名项内报名者可选择的内容，比如：项目名为服装，显示样式选择单选按钮组，报名者可选值设置为xl,xxl，xxxl,各选项之间请用半角逗号隔开。</p>
<p>4、设置完成，点击“保存”按钮。如需继续增加，请重复此过程！</p>

<a class="btn btn-success" href="http://www.51first.cn/frontend/web/index.php?r=site/content&id=<?php echo $id;?>" style="float: right; margin: 15px;">完成创建</a>

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
            url:"http://www.51first.cn/frontend/web/index.php?r=relese-event/set-item",
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