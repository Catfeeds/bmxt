<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\EchartsAsset;
use frontend\Hisune\EchartsPHP\ECharts;


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
/*
 * 总人数
 */
$sql = "select count(id) from bm_apply_info where apply_user=$user_id";
$xingmingc = $connection->createCommand($sql);
$number = $xingmingc->queryOne();

/*
 * 总报名费
 */
$pay = "select sum(apply_money) from bm_apply_info where apply_user=$user_id";
$pay1 = $connection->createCommand($pay);
$money = $pay1->queryOne();
?>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p><a class="btn btn-default" href="index.php?r=relese/create">发布赛事</a></p>-->
<!--    <p><a class="btn btn-default" href="index.php?r=relese/index">赛事管理</a></p>-->
<!---->
<!--    --><?php
//     echo '<p><a class="btn btn-default" href="index.php?r=users/view&id='.Yii::$app->user->id.'">个人资料</a></p>';
//    ?>
<!--    <p><a class="btn btn-default" href="">报表下载</a></p>-->

</div>
<div class="limit" id="limit">
    <ul class="nav_user" id="nav_user">

        <li class="nav1_user" style="color: #ffffff;">赛事管理</li>
        <li class="nav2_user" style="background: #eeeeee;" >机构信息</li>
        <li class="nav3_user" style="background: #eeeeee;" >报名统计</li>
    </ul>

    <div class="limit_l" id="limit_l">
        <!--赛事信息-->

        <div class="infor_comp" id="infor_comp">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    'event_name',
                    // 'addit',
                   // 'event_type',
                    [
                        'label'=>'赛事类型',
                        'format'=>'raw',
                        'value' => function($model){
                            $type=$model->type->event_type_name;

                            return $type;
                        }
                    ],
                    'apply_time_start',
                    // 'apply_time_end:datetime',
                    [
                        'label'=>'地点',
                        'format'=>'raw',
                        'value' => function($model){
                           $place=$model->place;
                            $didian='';
                           if($place==1){
                              $didian='济南市';
                           }if($place==2){
                                $didian='青岛市';
                            }if($place==3){
                                $didian='淄博市';
                            }

                            return $didian;
                        }
                    ],
                    // 'contact_name',
                    // 'contact_phone',
                    // 'contact_emaill:email',
                    // 'orgnize',
                    // 'orgnize_name',
                    // 'extend_id',
                    'apply_money',
                    //['attribute'=>'报名人数','value'=>'number'],
                    [
                        'label'=>'报名人数',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->id;
                            $userid=Yii::$app->user->id;
                            $url = "index.php?r=apply-info/index&event_id=".$id."&user_id=".$userid;
                            return Html::a($model->number, $url);
                        }
                    ],
                    [
                        'label'=>'更多操作',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->id;
                            $url = "index.php?r=relese-event/view&id=".$id;
                            return Html::a('查看', $url);
                        }
                    ],
                ],
            ]); ?>


            <div class="butbox" id="butbox">
                <?php echo '<a style="width: 160px; height: 40px;margin:10px;background: #0088e4; color: #ffffff; display:table-cell; text-align:center; vertical-align:middle;" href="index.php?r=relese-event/create">发布赛事</a>'; ?>
            </div>
        </div>

        <!--个人资料-->
        <div class="infor_user" id="infor_user">
            <img class="pull-right" src="" style="width: 215px; height: 215px; border: 1px solid #cccccc;">
            <p style="background: #F2F2F2;">机构名称：<?php foreach($usernamer as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p>通信地址：<?php foreach($dizhir as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p style="background: #F2F2F2;">联&nbsp;系&nbsp;人&nbsp;：<?php foreach($xingmingr as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p>手机号码：<?php foreach($phoner as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <p style="background: #F2F2F2;">电子邮箱：<?php foreach($emailr as $k){foreach($k as $v){ ?><?php echo $v ?><?php }} ?></p>
            <!--用js设置标签对齐及其宽度-->

            <?php echo '<a style="width: 160px; height: 40px;margin:10px;background: #0088e4; color: #ffffff; display:table-cell; text-align:center; vertical-align:middle;" href="index.php?r=ziliao/update&id='.Yii::$app->user->id.'">修改机构信息</a>'; ?>
        </div>

        <!--信息统计-->
        <div class="favor_comp" id="favor_comp" >

            <p style="padding-left: 20px">发布赛事：<?php echo $connumber ?>项</p></br>
            <p style="padding-left: 20px">总报名人数：<?php foreach($number as $k){ echo $k ?><?php } ?>人</p></br>
            <p style="padding-left: 20px">报名费收入：<?php foreach($money as $k){ echo $k ?><?php } ?>元</p></br>

        </div>

    </div>


</div>
<div>
    <?php
    $arrr = array();
    foreach($model as $k){
        $arrr[]= $k->event_name;
    }
    $arra = array();
    foreach($model as $k){
        $arra[]= $k->number;
    }
    $asset=EchartsAsset::register($this);
    $chart = new ECharts($asset->baseUrl);
    $chart->tooltip->show = true;
    $chart->legend->data = array('赛事报名人数表');
    $chart->xAxis = array(
        array(
            'type' => 'category',
            'data' => $arrr,


        )
    );
    $chart->yAxis = array(
        array('type' => 'value')
    );
    $chart->series = array(
        array(
            'name' => '报名人数',
            'type' => 'bar',
            'data' =>$arra,
        )
    );
    echo $chart->render('simple-custom-id');
    ?>

</div>
<div>
    <?php
    $arrr = array();
    foreach($model as $k){
        $arrr[]= $k->event_name;
    }
    $arra = array();
    foreach($model as $k){
        $arra[]= $k->apply_money;
    }
    $asset=EchartsAsset::register($this);
    $chart = new ECharts($asset->baseUrl);
    $chart->tooltip->show = true;
    $chart->legend->data = array('赛事报名费用数表');
    $chart->xAxis = array(
        array(
            'type' => 'category',
            'data' => $arrr,


        )
    );
    $chart->yAxis = array(
        array('type' => 'value')
    );
    $chart->series = array(
        array(
            'name' => '报名费用',
            'type' => 'bar',
            'data' =>$arra,
        )
    );
    echo $chart->render('simple-custom-id1');
    ?>

</div>

<!--#换为中文序号二字 shine_20151021-->
<script>
    var de_thead=document.getElementsByTagName("thead");
    var de_th=de_thead[0].getElementsByTagName("th");
    de_th[0].innerHTML="序号";
</script>