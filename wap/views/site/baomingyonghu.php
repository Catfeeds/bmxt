<?php
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\User;
use frontend\models\Team;
$this->title = '用户中心';

$this->registerCssFile('css/user_center.css');
$this->registerJsFile('js/jquery-1.11.3.min.js');
$this->registerJsFile('js/user_center.js');

$connection = Yii::$app->db;
$user_id = Yii::$app->user->id;
/*
 * 用户名
 */
$username = "select username,sex,birthday,email,dizhi,xingming,id_card,phone from bm_user where id=$user_id";

$usernamec = $connection->createCommand($username);

$usernamer = $usernamec->queryAll();

?>


<div class="limit" id="limit">
    <ul class="nav_user" id="nav_user">
        <li class="nav1_user" style="color: #ffffff;">个人资料</li>
        <li class="nav2_user" style="background: #eeeeee;">报名赛事</li>
        <li class="nav3_user" style="background: #eeeeee;" >收藏夹</li>
        <li class="nav3_user" style="background: #eeeeee;" >团队列表</li>
        <li class="nav3_user" style="background: #eeeeee;" >消息中心</li>
        <li calss="nav3_user" style="background: #eeeeee;" >家庭组</li>
    </ul>

    <div class="limit_l" id="limit_l">
<!--个人资料-->
        <div class="infor_user" id="infor_user">
            <?php foreach ($usernamer as $key=>$val) { ?>
                <p>用&nbsp;&nbsp;户&nbsp;&nbsp;名：<?php echo $val['username'] ?></p>
                <p style="background: #f2f2f2;">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<?php echo $val['xingming'] ?></p>
                <p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<?php echo $val['sex'] ?></p>
                <p style="background: #f2f2f2;">出生日期：<?php echo $val['birthday'] ?></p>
                <p>电子邮箱：<?php echo $val['email'] ?></p>
                <p style="background: #f2f2f2;">手机号码：<?php echo $val['phone'] ?></p>
                <p style="border-bottom: 1px solid #f2f2f2;">通信地址：<?php echo $val['dizhi'] ?></p>
                <p style="background: #f2f2f2;">身&nbsp;&nbsp;份&nbsp;&nbsp;证：<?php echo $val['id_card'] ?></p>
            <?php } ?>
    <!--用js设置标签对齐及其宽度-->
            <?php echo '<a class="btn btn-primary" style="margin-top: 10px; margin-left: 10px;" href="index.php?r=ziliao/update&id='.Yii::$app->user->id.'">修改个人信息</a>'; ?>
        </div>

    <!--赛事信息-->

        <div class="infor_comp" id="infor_comp">
            <div class="butbox" id="butbox">
                <button class="but_bein btn btn-primary" id="but_bein">已报名赛事</button>
                <button class="but_ended btn btn-primary" id="but_ended">获奖的赛事</button>
            </div>
            <ul class="bein" id="bein" >
                <?php if(!empty($model2)){ ?>
                <?php foreach($model2 as $key => $val){ ?>
                <li style="border: 1px solid seagreen;width: 690px;height: 122px;margin-top: 20px;">
                    <div style="float: left;">
                        <a href="index.php?r=site/content&id=<?php echo $val['id'] ?>" ><img src="<?php echo $val['event_img']  ?>" width="180px;" height="120px;"/></a>
                    </div>
                    <p style="float: left; margin: 20px 20px; width: 450px; height: 20px; overflow: hidden; font-size: 16px; line-height: 16px;"><?php echo $val['event_name']  ?></p>
                    <div style="float: left;margin-top: 0px;margin-left: 20px; ">
                        <p>报名时间：<?php echo $val['apply_time_start']  ?></p>
                        <p>结束时间：<?php echo $val['apply_time_end']  ?></p>
                    </div>
                    <div style="float: left;margin-top: 0px;margin-left: 20px;">
                        <p>报名费用：￥<?php echo $val['apply_money']  ?></p>
                        <p style="width">地点：<?php
                            $a=$val['place'];
                            $conf[1] = '济南市';
                            $conf[2] = '青岛市';
                            $conf[3] = '淄博市';
                            $a = $conf[$a];//通过配置的数组找到数字对应的中文
                            echo $a;
                            ?></p>
                    </div>
                </li>
                <?php } ?>
                <?php } ?>


            </ul>
            <!-- 小智 -->
            <ul class="ended" id="ended" >
                <?php if(!empty($model3)){ ?>
                <?php foreach($model3 as $key=>$val){ ?>
                    <li style="border: 1px solid red;width: 690px;height: 122px;margin-top: 20px;">
                        <div style="float: left;">
                            <a href="index.php?r=site/content&id=<?php echo $val['id'] ?>" ><img src="<?php echo $val['event_img']  ?>" width="180px;" height="120px;"/></a>
                        </div>
                        <p style="float: left; margin: 20px 20px; width: 450px; height: 20px; overflow: hidden; font-size: 16px; line-height: 16px;"><?php echo $val['event_name']  ?></p>
                        <div style="float: left;margin-top: 0px;margin-left: 20px; ">
                            <p>报名时间：<?php echo $val['apply_time_start']  ?></p>
                            <p>结束时间：<?php echo $val['apply_time_end']  ?></p>
                        </div>
                        <div style="float: left;margin-top: 0px;margin-left: 20px;">
                            <p>报名费用：￥<?php echo $val['apply_money']  ?></p>
                            <p style="width">地点：<?php
                                $a=$val['place'];
                                $conf[1] = '济南市';
                                $conf[2] = '青岛市';
                                $conf[3] = '淄博市';
                                $a = $conf[$a];//通过配置的数组找到数字对应的中文
                                echo $a;
                                ?></p>
                        </div>
                        <div style="float: left;margin-top: 0px;margin-left: 20px;">
                            <p>名次：<?php echo $val['position']  ?></p>
                        </div>
                    </li>
                <?php }}else{ ?>
                <div>
                    <p style="margin: 10px;">目前没有您的获奖信息，请继续加油。</p>
                    <img alt="加油" src="/images/fighting.png" style="width: 698px; height: 350px;" />
                </div>
                <?php } ?>
            </ul>
        </div>

<!--赛事收藏-->
        <div class="favor_comp" id="favor_comp" >
            <ul>
                <?php if(!empty($model1)){ ?>
                <?php foreach($model1 as $key=>$val){?>
                <li style="border: 1px solid black;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <a href="index.php?r=site/content&id=<?php echo $val['id'] ?>" ><img src="<?php echo $val['event_img']  ?>" width="225px;" height="150px;"/></a>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p style="width: 200px; height: 20px; overflow: hidden;"><?php echo $val['event_name']  ?></p>
                        <p>报名时间：<?php echo $val['apply_time_start']  ?></p>
                        <p>结束时间：<?php echo $val['apply_time_end']  ?></p>

                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">

                        <p>报名费用：￥<?php echo $val['apply_money']  ?></p>

                        <p style="width: 200px; height: 20px; overflow: hidden;">地点：<?php
                            $a=$val['place'];
                            $conf[1] = '济南市';
                            $conf[2] = '青岛市';
                            $conf[3] = '淄博市';
                            $a = $conf[$a];//通过配置的数组找到数字对应的中文
                            echo $a;
                            ?></p>
                        <input type="button" name="submit" value="取消收藏" class="brief_btn2"onclick="javascript:location='index.php?r=site/qx&event_id=<?php echo$val['id'];?>'">
                    </div>
                </li>
                <?php } ?>
                <?php } ?>

            </ul>
        </div>
        <!--    团队列表-->
        <div id="teamList" style="display: none;">
            <p>您加入的团队</p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'team_id',
                    [
                        'label'=>'查看队友',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->team_id;
                            $url = "index.php?r=site/duiyou&id=$id";

                            return Html::a('查看', $url);
                        }
                    ],
                    [
                        'label'=>'邀请队友',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->id;
                            $team_id=$model->team_id;
                            $url = "index.php?r=site/serchname&name=''&tid=$id&team_id=$team_id";

                            return Html::a('邀请', $url);
                        }
                    ],
                    [
                        'label'=>'解散队伍',
                        'format'=>'raw',
                        'value' => function($model){
                            $id=$model->team_id;
                            $url = "index.php?r=site/jiesan&id=$id";

                            return Html::a('解散', $url);
                        }
                    ],
                ],
            ]); ?>
            <?php echo '<a class="btn btn-primary" style="margin-top: 10px; margin-left: 10px;" href="index.php?r=team/create'.'">创建新团队</a>'; ?>
        </div>
        <!--消息中心-->
        <div id="msgCenter" style="display: none;">
            <?= GridView::widget([
                'dataProvider' => $messageProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'inviter',
                        'value' => function($messageProvider){
                            return User::getUsername($messageProvider->inviter);
                        }
                    ],
                    [
                        'attribute' => 'tid',
                        'value' => function($messageProvider){
                            return Team::getTeamname($messageProvider->tid);
                        }
                    ],
                    'send_time',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($messageProvider){
                            return $messageProvider->status == 1?"已接受" : Html::a('接受邀请','index.php?r=site/accept-invite&inviter='.$messageProvider->inviter.'&beinviter='.Yii::$app->user->id.'&tid='.$messageProvider->tid.'&status=1&reply=1&team_id='.$messageProvider->team_id);
                        }
                    ],
                    [
                        'attribute' => 'reply',
                        'value' =>function($messageProvider){
                            return $messageProvider->reply == 1 ? "已回复":"未接受";
                        }
                    ],
                ],
            ]); ?>
        </div>

        <!--家庭分组-->
        <div id="familyTeam" style="display: none;">


            <!--成员列表-->
            <div>
                <a class="btn btn-primary" href="/index.php?r=family-info/create">添加新成员</a>
                <?= GridView::widget([
                    'dataProvider' => $familyInfoProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        'user_id',
                        'name',
                        [
                            'attribute' => 'sex',
                            'value'=> function($familyInfoProvider){
                                return $familyInfoProvider->sex ==0? '女':'男';
                            }
                        ],
                        'age',
                        'id_card',
                         [
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>'{view}  {update} {delete}',
                                'header' => '操作',
                                'buttons'=>[
                                    'view'=> function ($url, $model, $key) {
                                        return Html::a('<button class="btn btn-xs btn-primary"><i class="ace-icon fa fa-eye bigger-120">预览</i></button>',['family-info/view','id'=>$model->id]);
                                    },
                                    'update'=> function ($url, $model, $key) {
                                        return Html::a('<button class="btn btn-xs btn-warning"><i class="ace-icon fa fa-pencil bigger-120">修改</i></button>',['family-info/update','id'=>$model->id]);
                                    },
                                    'delete'=>function ($url,$model,$key){
                                        return Html::a('<botton class="btn btn-xs btn-danger"><i class="ace-icon fa fa-times bigger-120">删除</i></botton>',['family-info/delete','id'=>$model->id],['data-confirm'=>'您真的要删除?']);
                                    }],
                        ],
                    ],
                ]); ?>
            </div>
            <div>
                <a class="btn btn-primary" href="/index.php?r=family-team/create">创建新团队</a>
                <?= GridView::widget([
                    'dataProvider' => $familyListProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'user_id',
                        'family_team_id',
                        'family_team_name',
                        'family_team_num',
                        'family_team_content',
                        [
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>'{view}  {update} {delete}',
                                'header' => '操作',
                                'buttons'=>[
                                    'view'=> function ($url, $model, $key) {
                                        return Html::a('<button class="btn btn-xs btn-primary"><i class="ace-icon fa fa-eye bigger-120">预览</i></button>',['family-team/view','id'=>$model->id]);
                                    },
                                    'update'=> function ($url, $model, $key) {
                                        return Html::a('<button class="btn btn-xs btn-warning"><i class="ace-icon fa fa-pencil bigger-120">修改</i></button>',['family-team/update','id'=>$model->id]);
                                    },
                                    'delete'=>function ($url,$model,$key){
                                        return Html::a('<botton class="btn btn-xs btn-danger"><i class="ace-icon fa fa-times bigger-120">删除</i></botton>',['family-team/delete','id'=>$model->id],['data-confirm'=>'您真的要删除?']);
                                    }],
                                ],
                        ],
                ]); ?>
            </div>
        </div>
    </div>


<!--   右侧推荐赛事-->
    <div class="limit_r" id="limit_r">
        <div class="">
            <p>推荐赛事</p>
        </div>
        <div style="height:300px;width:280px;overflow: hidden; ">
            <ul style="height: 100%">
                <?php if(!empty($tuijian)){ ?>
                <?php foreach($tuijian as $key=>$val){ ?>
                    <li style="float: left;  list-style: none; margin-top: 5px; ">
                        <div style=" height:69px; width:280px; border: 1px seagreen solid">

                            <a href="index.php?r=site/content&id=<?php echo $val->id ?>" ><img style="float: left;" width="100px;" height="67px;" src="<?php echo $val->event_img ?>"/></a>
                            <div class="float" style="margin-top: 20px; margin-left: 10px">
                                <a href="index.php?r=site/content&id=<?php echo $val->id ?>" ><p><?php echo $val->event_name ?></p></a>

                            </div>



                        </div>
                    </li>
                <?php }?>
                <?php }?>




            </ul>




            <div style="clear: left"></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>








