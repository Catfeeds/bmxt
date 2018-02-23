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
$username = "select username,sex,birthday,email,phone,dizhi,xingming from bm_user where id=$user_id";

$usernamec = $connection->createCommand($username);

$usernamer = $usernamec->queryAll();
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

        <li class="nav1_user" style="color: #ffffff;">个人赛事管理</li>
        <li class="nav3_user" style="background: #eeeeee;" >团队赛事管理</li>
        <li class="nav2_user" style="background: #eeeeee;" >机构账号信息</li>
        <!--信息统计报表按钮-->
        <a class="form_btn" style="" href="index.php?r=site/baobiao">查看报表</a>
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
                    [
                        'attribute'=>'addit',
                        'value'=>function ($model){
                            return $model->addit===1?'已审核':'审核中';
                        }
                    ],
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
                    [
                        'attribute'=>'is_end',
                        'value'=>function ($model){
                            return $model->is_end===1?'已结束':'进行中';
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
                    [
                        'label'=>'拓展管理',
                        'format'=>'raw',
                        'value' => function($model) {
                            $id = $model->id;
                            $tuozhan = $model->is_extends;
                            if ($tuozhan == 1) {
                                $url = "index.php?r=relese-event/create-self&id=" . $id;
                                return Html::a('查看', $url);
                            }

                        }
                    ],
                    [
                        'label'=>'名单下载',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->id;
                            $userid=Yii::$app->user->id;
                            $url = "index.php?r=apply-info/download&event_id=".$id;
                            return Html::a('名单下载', $url);
                        }
                    ],
                ],
            ]); ?>


            <div class="butbox" id="butbox">
                <a class="btn btn-info" href="index.php?r=relese-event/create" style="margin-left: 15px;">发布个人赛事</a>
                <a class="btn btn-info" href="index.php?r=newss/create" style="margin-left: 15px;">发布赛事动态公告</a>
            </div>
        </div>
        <!--团队赛事管理-->
        <div class="favor_comp" id="favor_comp" >
            <?= GridView::widget([
                'dataProvider' => $dataProvider1,
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
                    [
                        'attribute'=>'is_end',
                        'value'=>function ($model){
                            return $model->is_end===1?'已结束':'进行中';
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
                        'value' => function($model1){
                            $id=$model1->id;
                            $userid=Yii::$app->user->id;
                            $url = "index.php?r=team-apply-info/index&event_id=".$id."&user_id=".$userid;
                            return Html::a($model1->number, $url);
                        }
                    ],
                    [
                        'label'=>'更多操作',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->id;
                            $url = "index.php?r=relese-team-event/view&id=".$id;
                            return Html::a('查看', $url);
                        }
                    ],
                    [
                        'label'=>'名单下载',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->id;
                            $userid=Yii::$app->user->id;
                            $url = "index.php?r=apply-info/download&event_id=".$id;
                            return Html::a('名单下载', $url);
                        }
                    ],
                ],
            ]); ?>
            <div class="butbox" id="butbox">
            <a class="btn btn-success" href="index.php?r=relese-team-event/create" style="margin-left: 15px;">发布团体赛事</a>
            </div>
        </div>
        <!--个人资料-->
        <div class="infor_user" id="infor_user">
            <img class="pull-right" src="<?php foreach($img as $key=>$val){echo $val->img;} ?>" style="width: 215px; height: 215px; border: 1px solid #cccccc;">
            <?php foreach($usernamer as $key=>$val){ ?>
            <p style="background: #F2F2F2;">机构名称：<?php echo $val['username'] ?></p>
            <p>通信地址：<?php echo $val['dizhi'] ?></p>
            <p style="background: #F2F2F2;">联&nbsp;系&nbsp;人&nbsp;：<?php echo $val['xingming'] ?></p>
            <p>手机号码：<?php echo $val['phone'] ?></p>
            <p style="background: #F2F2F2;">电子邮箱：<?php echo $val['email'] ?></p>
            <?php } ?>
            <!--用js设置标签对齐及其宽度-->
            <?php echo '<a style="width: 160px; height: 40px;margin:10px;background: #0088e4; color: #ffffff; display:table-cell; text-align:center; vertical-align:middle;" href="index.php?r=ziliao/updateyh&id='.Yii::$app->user->id.'">修改机构信息</a>'; ?>
        </div>



    </div>
    <div>
        <?php  foreach($sjuser_id as $key=>$val){
            $id=$val['id'];
            if(!empty($id)){
                ?>
                <a class="btn btn-success" href="index.php?r=site/xiaji&id=<?php echo $id ?>">下级<?php echo $val['username'] ?>的赛事</a>
           <?php }
        } ?>

    </div>

</div>


<!--#换为中文序号二字 shine_20151021-->
<script>
    var de_thead=document.getElementsByTagName("thead");
    var de_th=de_thead[0].getElementsByTagName("th");
    de_th[0].innerHTML="序号";
</script>