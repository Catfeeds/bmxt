<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$cssString="

        body{
        background:url(/images/multi_back.png) no-repeat ;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
        }
";
$this->registerCss($cssString);

$this->registerCssFile('css/header.css');
$this->registerCssFile('css/brief.css');
$this->registerCssFile('css/main.css');
$this->registerCssFile('css/bottom.css');
$this->registerJsFile('js/content.js');
echo '<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Y6F597W87rrsWrmuwUGgEFjy"></script>';
$connection = Yii::$app->db;

?>
<div class="brief">
    <img class="brief_1" src="<?=$basic_model['event_img']; ?>"/>
    <div class="brief_2">
        <p style="font-weight:700;font-size:18px;margin:10px 0px 10px;width: 350px;height: 50px;overflow: hidden " ><?=$basic_model['event_name'];?></p>
        <p style="width: 350px;height: 25px;overflow: hidden ">赛事地点：<?=$basic_model['place'];?></p>
        <p>赛事类型：<?=$basic_model['event_type'];?></p>
        <p>报名开始时间：<?=$basic_model['apply_time_start'];?></p>
        <p>报名结束时间：<?=$basic_model['apply_time_end'];?></p>
        <p>报名费：￥<?=$basic_model['apply_money']; ?>&nbsp;元</p>
        <p>主办方：<span style=""><?=$basic_model['organize_type'];?></span></p>
        <button type="button" class="brief_btn" id="brief_btn1" style="margin-right: 5px;">报名</button>
        <input type="button" name="submit" value="收藏" class="brief_btn" style="margin: 0px 10px;" onclick="javascript:location='index.php?r=site/shoucang&event_id=<?=$basic_model['id'];?>'">
        <input type="button" name="submit" value="查看机构信息" class="brief_btn" style="margin-left: 5px;" onclick="javascript:location='index.php?r=site/shoucang&event_id=<?=$basic_model['id'];?>'">

        </p>
    </div>

        <div class="bdsharebuttonbox">
            <a href="#" class="bds_more" data-cmd="more"></a>
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
        </div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

</div>
<div class="main">
    <ul class="nav_user" id="nav_user">
        <li class="nav1_user" style="color: #ffffff;">赛事详情</li>
        <li class="nav2_user" style="background: #EEEEEE; color: #FF6701;">赛事报名</li>
        <li class="nav3_user" style="background: #EEEEEE; color: #FF6701;">赛事结果</li>

    </ul>
        

    <div id="detail_comp">
        <?=$basic_model['wenzhang'] ?>
     </div>

<!--赛事报名-->
    <div style="width: 610px;">

    <div id="sign_comp" style="display: none;">
        <?php $form = ActiveForm::begin(['action' => ['site/handle'],'method'=>'post']); ?>
        <input type="hidden" id="info-user_id" class="form-control" name="Info[user_id]" value="<?=Yii::$app->user->isGuest?0: Yii::$app->user->identity->id;?>">
        <?= $form->field($basic, 'bm_name')->textInput(['maxlength' => true,'style'=>'width:600px']) ?>
        <?= $form->field($basic, 'sex')->radioList(['1'=>'男','0'=> '女'])?>
        <?= $form->field($basic, 'phone')->textInput(['style'=>'width:600px']) ?>
        <input type="hidden" id="info-bm_time" class="form-control" name="Info[bm_time]" value="<?php echo time();?>">
        <?= $form->field($basic, 'email')->textInput(['maxlength' => true,'style'=>'width:600px']) ?>
        <?= $form->field($basic, 'id_number')->textInput(['maxlength' => true,'style'=>'width:600px']) ?>
        <input type="hidden" id="info-status" class="form-control" name="Info[bm_status]" value="0">
        <input type="hidden" id="info-project" class="form-control" name="Info[bm_project]" value="<?php echo Yii::$app->request->get()['id']?>">
        <input type="hidden" name="Info[event_name]" value="<?=$basic_model['event_name'];?>">
        <input type="hidden" name="Info[is_extends]" value="<?=$basic_model['is_extends'];?>">
        <input type="hidden" name="Info[apply_money]" value="<?=$basic_model['apply_money']; ?>">
        <table>
            <?php
            echo $field;
            ?>
        </table>
        <?= Html::submitButton($basic->isNewRecord ? '点击提交报名' : '更新', ['class' => $basic->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        </form>
    </div>
    </div>

<!--赛事结果-->
    <div id="result_comp">
        <p>主办方尚未上传，敬请期待。</p>
    </div>



<!--以下为友情链接和地图代码-->


    <div style="clear: both;margin: 10px 0px;">
</div>


