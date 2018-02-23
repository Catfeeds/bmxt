<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = '用户中心';
$this->registerCssFile('css/fbuser_center.css');
$this->registerJsFile('js/jquery-1.11.3.min.js');
$this->registerJsFile('js/fbuser_center.js');
$connection = Yii::$app->db;
$user_id = Yii::$app->user->id;
/*
 * 用户名
 */
$username = "select username from bm_user where id=$user_id";

$usernamec = $connection->createCommand($username);

$usernamer = $usernamec->queryAll();

/*
 * 性别
 */
$sex = "select sex from bm_user where id=$user_id";

$sexc = $connection->createCommand($sex);

$sexr = $sexc->queryAll();

/*
 * 出生日期
 */
$birthday = "select birthday from bm_user where id=$user_id";

$birthdayc = $connection->createCommand($birthday);

$birthdayr = $birthdayc->queryAll();

/*
 * email
 */
$email = "select email from bm_user where id=$user_id";

$emailc = $connection->createCommand($email);

$emailr = $emailc->queryAll();
/*
 * 手机号
 */
$phone = "select phone from bm_user where id=$user_id";

$phonec = $connection->createCommand($phone);

$phoner = $phonec->queryAll();
/*
 * 地址
 */
$dizhi = "select dizhi from bm_user where id=$user_id";

$dizhic = $connection->createCommand($dizhi);

$dizhir = $dizhic->queryAll();
/*
 * 姓名
 */
$xingming = "select xingming from bm_user where id=$user_id";
$xingmingc = $connection->createCommand($xingming);
$xingmingr = $xingmingc->queryAll();
?>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><a class="btn btn-default" href="index.php?r=relese/create">发布赛事</a></p>
    <p><a class="btn btn-default" href="index.php?r=relese/index">赛事管理</a></p>

    <?php
     echo '<p><a class="btn btn-default" href="index.php?r=users/view&id='.Yii::$app->user->id.'">个人资料</a></p>';
    ?>
    <p><a class="btn btn-default" href="">报表下载</a></p>

</div>
<div class="limit" id="limit">
    <ul class="nav_user" id="nav_user">

        <li class="nav1_user">赛事管理</li>
        <li class="nav2_user" style="background: #cccccc;" >个人资料</li>
        <li class="nav3_user" style="background: #cccccc;" >收藏夹</li>
    </ul>

    <div class="limit_l" id="limit_l">
        <!--赛事信息-->

        <div class="infor_comp" id="infor_comp">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'event_name',
                    // 'addit',
                    'event_type',
                    'apply_time_start',
                    // 'apply_time_end:datetime',
                    // 'place',
                    // 'contact_name',
                    // 'contact_phone',
                    // 'contact_emaill:email',
                    // 'orgnize',
                    // 'orgnize_name',
                    // 'extend_id',

                    ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'headerOptions' => ['width' => '80']],
                ],
            ]); ?>


            <div class="butbox" id="butbox">
                <?php echo '<a style="width: 160px; height: 40px;margin:10px;background: #0088e4; color: #ffffff; display:table-cell; text-align:center; vertical-align:middle;" href="index.php?r=relese/create">发布赛事</a>'; ?>
            </div>
        </div>

        <!--个人资料-->
        <div class="infor_user" id="infor_user">

            <p><span>用户</span>名:&nbsp<?php foreach($usernamer as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p><span>姓</span>名:&nbsp<?php foreach($xingmingr as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p><span>性</span>别:&nbsp<?php foreach($sexr as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p><span>出生日</span>期:&nbsp<?php foreach($birthdayr as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p><span>电子邮</span>箱:&nbsp<?php foreach($emailr as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p><span>手机</span>号:&nbsp<?php foreach($phoner as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p><span>通信地</span>址:&nbsp<?php foreach($dizhir as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <!--用js设置标签对齐及其宽度-->
            <?php echo '<a style="width: 160px; height: 40px;margin:10px;background: #0088e4; color: #ffffff; display:table-cell; text-align:center; vertical-align:middle;" href="index.php?r=ziliao/update&id='.Yii::$app->user->id.'">修改个人信息</a>'; ?>
        </div>

        <!--赛事收藏-->
        <div class="favor_comp" id="favor_comp" >
            <ul>
                <li style="border: 1px solid black;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <img src="images/comptt_1.gif"/>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>青岛国际马拉松赛</p>
                        <p>报名时间：2015/08/01-14</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>赛事状态：已完成</p>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>赛事类型：马拉松</p>
                        <p>报名费用：￥100</p>
                        <p>报名人数：20人</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </li>
                <li style="border: 1px solid black;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <img src="images/comptt_1.gif"/>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>青岛国际马拉松赛</p>
                        <p>报名时间：2015/08/01-14</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>赛事状态：已完成</p>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>赛事类型：马拉松</p>
                        <p>报名费用：￥100</p>
                        <p>报名人数：20人</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </li>
                <li style="border: 1px solid black;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <img src="images/comptt_1.gif"/>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>青岛国际马拉松赛</p>
                        <p>报名时间：2015/08/01-14</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>赛事状态：已完成</p>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>赛事类型：马拉松</p>
                        <p>报名费用：￥100</p>
                        <p>报名人数：20人</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

<!--    <div class="limit_r" id="limit_r">-->
<!---->
<!--    </div>-->

</div>

