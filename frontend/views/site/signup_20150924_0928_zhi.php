<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = '注 册';
//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('css/signup.css');

function random($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}
$_SESSION['send_code'] = random(6,1);

?>

<script type="text/javascript" src="/vendor/mobile/jquery.js"></script>
<script language="javascript">
    function get_mobile_code(){

        $.post('/vendor/mobile/sms.php', {mobile:jQuery.trim($('#signupform-phone').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
            alert(jQuery.trim(unescape(msg)));
            if(msg=='提交成功'){
                RemainTime();
            }
        });
    };
    var iTime = 59;
    var Account;
    function RemainTime(){
        document.getElementById('zphone').disabled = true;
        var iSecond,sSecond="",sTime="";
        if (iTime >= 0){
            iSecond = parseInt(iTime%60);
            iMinute = parseInt(iTime/60)
            if (iSecond >= 0){
                if(iMinute>0){
                    sSecond = iMinute + "分" + iSecond + "秒";
                }else{
                    sSecond = iSecond + "秒";
                }
            }
            sTime=sSecond;
            if(iTime==0){
                clearTimeout(Account);
                sTime='获取手机验证码';
                iTime = 59;
                document.getElementById('zphone').disabled = false;
            }else{
                Account = setTimeout("RemainTime()",1000);
                iTime=iTime-1;
            }
        }else{
            sTime='没有倒计时';
        }
        document.getElementById('zphone').value = sTime;
    }
</script>
<div class="site-signup" style="width: 1590px;">
    <h1 style="text-align: center; padding-top: 20px;"><?= Html::encode($this->title) ?></h1>

    <p style="text-align: center;">注册请填写以下信息：</p>

    <div class="row" style="margin-left: 620px;">
        <div class="col-lg-5" style="width: 400px;">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model,'sex')->radioList(['男'=>'男','女'=>'女']) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'phone') ?>
                <input id="zphone" type="button" value=" 获取手机验证码 " onClick="get_mobile_code();">
                <?= $form->field($model, 'phone_code') ?>
                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
<!--            <div class="form_group">-->
<!--                <a class="btn btn-primary" href="index.php">返回首页</a>-->
<!--            </div>-->
        </div>
    </div>
</div>
