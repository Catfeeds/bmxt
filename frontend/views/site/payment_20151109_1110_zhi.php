<div class="" style="width: 60%; margin: 10px auto; border: 1px solid #DDDDDD; border-radius: 5px;">
    <div style="width: 100%; border:2px solid #FDBB84; background: #D8FAD8;">
        <p>12332</p>
    </div>
    <div style="width: 90%; margin: 20px auto; border:2px solid #FDBB84; background: #EDE5B7;">


<?php
/**
 * 文件名 : payment.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: payment.php  2015/10/13 $
*/
use geekdawns\unionpay\Unionpay;

 echo(Unionpay::widget([
     'order_sn' => time()-1,
     'log_id'   => '45646',
     'add_time' => time(),
     'order_amount' => $info['apply_money'],
     '_csrf' => \Yii::$app->request->getCsrfToken (),
     'apply_id' => $info['apply_id'],
 ]));
Unionpay::widget();
?>
    </div>
</div>
<script>
    alert(0);
</script>