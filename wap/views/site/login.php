<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//背景图片居中 shine_20151020
$cssString="
    body{
        background:url(/css/images/beijing9.png) no-repeat;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
        }
";
$this->registerCss($cssString);
//container居中 shine_20151020
$jsString="
        document.getElementsByClassName('container')[0].style.margin='0px auto 0px';
";
$this->registerJs($jsString);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '登 录';
//$this->params['breadcrumbs'][] = $this->title;
//$this->registerCssFile('css/login.css');
?>
<div class="site-login" style="width: 100%;">
    <h1 style="text-align: center; padding-top: 20px;"><?= Html::encode($this->title) ?></h1>

    <p style="text-align: center;">登录请填写以下字段:</p>

    <div class="row" style="margin-bottom: 50px;">
        <div class="" style="width: 500px; margin: 0px auto;">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    如果你忘记了你的密码<?= Html::a('请点我', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <a class="btn btn-primary" href="index.php?r=site/signup">注册</a><!--添加注册链接 shine_20151020-->
                    <a class="btn btn-primary pull-right " href="index.php">返回首页</a>

                </div>
            <?php ActiveForm::end(); ?>
            <div class="form_group">
            </div>
        </div>
    </div>
</div>
