<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//背景图片居中 shine_20151020
$cssString="
    body{
        background:url(/css/images/beijing13.png) no-repeat ;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
        }
";
$this->registerCss($cssString);
//container居中 shine_20151020
$jsString="
        document.getElementsByClassName('container')[0].style.margin='0px auto 20px';
";
$this->registerJs($jsString);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = '注 册';
//$this->params['breadcrumbs'][] = $this->title;
//$this->registerCssFile('css/signup.css');

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
    window.alert = function(str)
    {
        var shield = document.createElement("DIV");
        shield.id = "shield";
        shield.style.position = "absolute";
        shield.style.left = "0px";
        shield.style.top = "0px";
        shield.style.width = "100%";
        shield.style.height = document.body.scrollHeight+"px";
//弹出对话框时的背景颜色
        shield.style.background = "#fff";
        shield.style.textAlign = "center";
        shield.style.zIndex = "25";
//背景透明 IE有效
//shield.style.filter = "alpha(opacity=0)";
        var alertFram = document.createElement("DIV");
        alertFram.id="alertFram";
        alertFram.style.position = "absolute";
        alertFram.style.left = "50%";
        alertFram.style.top = "50%";
        alertFram.style.marginLeft = "-225px";
        alertFram.style.marginTop = "-75px";
        alertFram.style.width = "450px";
        alertFram.style.height = "150px";
        alertFram.style.background = "#ff0000";
        alertFram.style.textAlign = "center";
        alertFram.style.lineHeight = "150px";
        alertFram.style.zIndex = "300";
        strHtml = "<ul style=\"list-style:none;margin:0px;padding:0px;width:100%\">\n";
        strHtml += " <li style=\"background:#DD828D;text-align:left;padding-left:20px;font-size:14px;font-weight:bold;height:25px;line-height:25px;border:1px solid #F9CADE;\">消息</li>\n";
        strHtml += " <li style=\"background:#fff;text-align:center;font-size:25px;height:120px;line-height:120px;\">"+str+"</li>\n";
        strHtml += " <li style=\"background:#FDEEF4;text-align:center;font-weight:bold;height:35px;line-height:25px; \"><input type=\"button\" value=\"确 定\" onclick=\"doOk()\" /></li>\n";
        strHtml += "</ul>\n";
        alertFram.innerHTML = strHtml;
        document.body.appendChild(alertFram);
        document.body.appendChild(shield);
//        var ad = setInterval("doAlpha()",5);
        this.doOk = function(){
            alertFram.style.display = "none";
            shield.style.display = "none";
        }
        alertFram.focus();
        document.body.onselectstart = function(){return false;};
    }

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
    $("#zphone").bind("click", function () {
        $.MsgBox.Alert("消息", "哈哈，添加成功！");
    });
</script>
<div class="site-signup" style="width: 100%;"><!--宽度改为100% shine-->
    <h1 style="text-align: center; padding-top: 20px;"><?= Html::encode($this->title) ?></h1>

    <p style="text-align: center;">注册请填写以下信息：</p>

    <div class="row" style="margin-bottom: 50px;">
        <div class="" style="margin: 0px auto; width: 500px;">
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
            <div class="form_group">
                <a class="btn btn-primary" href="index.php">返回首页</a>
            </div>
        </div>
    </div>
</div>
