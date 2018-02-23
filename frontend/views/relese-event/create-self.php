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
            <th>自定义项目名</th>
            <th>显示样式</th>
            <th>二级属性</th>
            <th>修改</th>
        </tr>
    </thead>
    <?php
    //统计数组序号
    $count = 1;
    ?>
    <?php foreach($temp as $key => $val){?>
        <form class="form-control" id="update<?php echo $count++;?>">
                <tr>
                    <td><input class="form-control" value="<?php echo $key;?>" name="field_name" /></td>
                    <td>
                        <input type="hidden" name="field_type" value="<?php echo $val['field_type'];?>"/>
                        <fieldset>
                            <select  class="form-control" disabled>
                                <?php
                                foreach($fieldtype as $value){?>
                                    <option  value="<?php echo $value['id'];?>"<?php if($value['id'] == $val['field_type']){echo 'selected';}?>><?php echo $value['type_name']?></option>;
                                <?php }?>
                            </select>
                        </fieldset>

                    </td>
                    <td>
                        <input type="hidden" name="event_id" value="<?php echo $id;?>" />
                        <input type="hidden" name="extends_name" value="extends<?php echo ($count-1);?>">


                        <input type="hidden" value="<?php echo Yii::$app->request->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
                        <?php
                        $cou = count($val['field_content']);
                        for($i = 0; $i < $cou; $i++){
                            if($cou ==  1){?>
                                <input class="form-control" value="<?php echo $val['field_content'][$i];?>" name="field_content[<?php echo $i;?>]" readonly/>
                            <?php }else{?>
                                <input class="form-control" value="<?php echo $val['field_content'][$i];?>" name="field_content[<?php echo $i;?>]"/>
                            <?php }?>



                        <?php }?>
                    </td>
                    <td><input type="button" class="btn btn-default" onclick="UpdateItem(<?php echo ($count-1);?>)" value="修改"/> </td>
                </tr>
        </form>

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
<!--<blockquote>-->
<!--    <p>使用说明：</p>-->
<!--</blockquote>-->
<!--<p>1、点击“+”，在“自定义项名称”后输入项目名，比如：服装。</p>-->
<!--<p>2、选择“显示样式”，这里的栏位类型将设定报名页面的展示形式。比如：多选输入框，则报名者将可以选择多个选项。</p>-->
<!--<p>3、选择“报名者可选值”，则是定义该报名项内报名者可选择的内容，比如：项目名为服装，显示样式选择单选按钮组，报名者可选值设置为xl,xxl，xxxl,各选项之间请用/隔开。</p>-->
<!--<p>4、设置完成，点击“保存”按钮。如需继续增加，请重复此过程！</p>-->

<a class="btn btn-success" href="http://www.51first.cn/index.php?r=site/content&id=<?php echo $id;?>" style="float: right; margin: 15px;">完成创建</a>
<h3 style="margin-top: 50px; color: red;">实例说明：</h3>
<p style="color: red;">1.<img src="../images/1.png"/></p>
<p style="color: red;">2.<img src="../images/2.png"/></p>
<p style="color: red;">3.<img src="../images/3.png"/></p>
<p style="color: red;">4.<img src="../images/4.png"/></p>
<p style="color: red;">5.<img src="../images/5.png"/></p>
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
            url:"http://www.51first.cn/index.php?r=relese-event/set-item",
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

        //异步更改自定义选项
    function UpdateItem(id){
        var id = id;
        $.ajax({
            url:"http://www.51first.cn/index.php?r=relese-event/update-item",
            data:$('#update'+id).serialize(),
            type:'post',
            success:function(data){
                alert(data);
                //重新加载一次页面
                window.location.reload();
            }
        });
    }
</script>
