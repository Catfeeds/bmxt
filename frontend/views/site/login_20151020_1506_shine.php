<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '登 录';
//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('css/login.css');
?>
<div class="site-login" style="width: 1590px;">
    <h1 style="text-align: center; padding-top: 20px;"><?= Html::encode($this->title) ?></h1>

    <p style="text-align: center;">登录请填写以下字段:</p>

    <div class="row" style="margin-left: 620px;">
        <div class="col-lg-5" style="width: 400px;">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    如果你忘记了你的密码<?= Html::a('请点我', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            <div class="form_group">
                <a class="btn btn-primary" href="index.php">返回首页</a>
            </div>
        </div>
    </div>
</div>
