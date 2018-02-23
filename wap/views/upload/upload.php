<?php
use yii\widgets\ActiveForm;

?>
<div class="row" style="width: 60%; margin: 20px auto;">
    <h3 class="text-center" style="margin: 20px 0 20px;">参赛者名单上传</h3>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'file')->fileInput()->label('请点击浏览选择要上传的文件（仅限.xls文件格式）') ?>
    <button class="btn btn-success">点击上传并查看名单</button>
    <?php ActiveForm::end() ?>
    <h5>注意事项：</h5>
    <p class="help-block text-justify">1、请在用户中心->员工信息页面点击“员工格式表”下载按钮，然后在下载的“员工格式表”中按照要求填写相关信息，填写完毕后保存并上传。为保证数据的正确上传，<strong><i>请确保在填写“员工格式表”前将单元格设置为文本模式。</i></strong></p>
    <p class="help-block text-justify">2、单元格设置为文本模式方法：打开“员工格式表”，Ctrl+A选中所有单元格，单击鼠标右键后点击设置单元格格式，在新打开的单元格格式设置菜单中的数字选项卡下选择文本，点击确定，完成操作。</p>
    <button class="btn btn-info" id="help-text">点击查看示例图片</button>
    <div class="row" id="help-images" style="display: none; margin: 10px auto;">
        <img class="col-lg-3" alt="help_20151106001" src="/images/help/help_20151106001.png" />
        <img class="col-lg-9" alt="help_20151106002" src="/images/help/help_20151106002.png" />
    </div>
</div>
<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#help-text").click(function(){
            $("#help-images").toggle();
        });
    });
</script>