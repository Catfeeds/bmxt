<h3 style="text-align: center">支付页面</h3>
<div class="" style="width: 60%; margin: 10px auto; border: 1px solid #DDDDDD; border-radius: 5px;">
    <div style="width: 100%; border:2px solid #FDBB84; background: #D8FAD8;">
        <table class="table">
        <?php foreach($paid as $key=>$val){ ?>
        <tr><td>赛事名：</td><td><?php echo$val->event_name ?></td></tr>
            <tr><td>费用：</td><td><?php echo$val->apply_money ?></td></tr>
            <tr><td>报名人：</td><td><?php echo$val->bm_name ?></td></tr>
            <tr><td>报名人手机：</td><td><?php echo$val->phone ?></td></tr>
            <tr><td>报名人身份证：</td><td><?php echo$val->id_number ?></td></tr>
        <?php } ?>
        </table>
    </div>


<div style="text-align: center">
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
     'type' => 1,
 ]));
Unionpay::widget();

?>
</div>
</div>