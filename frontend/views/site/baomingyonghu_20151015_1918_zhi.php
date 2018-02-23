<?php
use yii\helpers\Html;

$this->title = '用户中心';

$this->registerCssFile('css/user_center.css');
$this->registerJsFile('js/jquery-1.11.3.min.js');
$this->registerJsFile('js/user_center.js');

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


<div class="limit" id="limit">
    <ul class="nav_user" id="nav_user">
        <li class="nav1_user" ><a href="#">个人资料</a></li>
        <li class="nav2_user" style="background: #cccccc;"><a href="#">报名赛事</a></li>
        <li class="nav3_user" style="background: #cccccc;" ><a href="#">收藏夹</a></li>
    </ul>

    <div class="limit_l" id="limit_l">
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

    <!--赛事信息-->

        <div class="infor_comp" id="infor_comp">
            <ul class="bein" id="bein" >
                <?php foreach($saishi as $key => $val){ ?>
                <li style="border: 1px solid seagreen;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <img src="<?php echo $val->event_img  ?>" width="225px;" height="150px;"/>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p style="width: 200px; height: 20px; overflow: hidden;"><?php echo $val->event_name  ?></p>
                        <p>报名时间：<?php echo $val->apply_time_start  ?></p>
                        <p>时间：<?php echo $val->apply_time_end  ?></p>
                        <p style="color: green;">赛事状态：<?php  ?></p>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>赛事类型：</p>
                        <p>报名费用：￥<?php echo $val->apply_money  ?></p>
                        <p>报名人数：</p>
                        <p>地点：<?php echo $val->place  ?></p>
                    </div>
                </li>
                <?php } ?>

            </ul>

            <ul class="ended" id="ended" >

                <li style="border: 1px solid red;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <img src="images/comptt_1.gif"/>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>青岛国际马拉松赛</p>
                        <p>报名时间：2015/08/01-14</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p style="color: red;">赛事状态：已完成</p>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>赛事类型：马拉松</p>
                        <p>报名费用：￥100</p>
                        <p>报名人数：20人</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </li>


            </ul>
            <div class="butbox" id="butbox">
                <button class="but_bein" id="but_bein">已报名赛事</button>
                <button class="but_ended" id="but_ended">获奖的赛事</button>
            </div>
        </div>

<!--赛事收藏-->
        <div class="favor_comp" id="favor_comp" >
            <ul>
                <?php foreach($model1 as $key=>$val){?>
                <li style="border: 1px solid black;width: 690px;height: 152px;margin-top: 20px;">
                    <div style="float: left;">
                        <img src="<?php echo $val->event_img  ?>" width="225px;" height="150px;"/>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p style="width: 200px; height: 20px; overflow: hidden;"><?php echo $val->event_name  ?></p>
                        <p>报名时间：<?php echo $val->apply_time_start  ?></p>
                        <p>时间：<?php echo $val->apply_time_end  ?></p>
                        <p>赛事状态：</p>
                    </div>
                    <div style="float: left;margin-top: 20px;margin-left: 20px;">
                        <p>赛事类型：</p>
                        <p>报名费用：￥<?php echo $val->apply_money  ?></p>
                        <p>报名人数：
<!--                            --><?php //foreach($model2 as $key=>$v){ print_r($v);} ?>
                        </p>
                        <p style="width: 200px; height: 20px; overflow: hidden;">地点：<?php echo $val->place  ?></p>
                    </div>
                </li>
                <?php } ?>

            </ul>
        </div>
    </div>

    <div class="limit_r" id="limit_r">
        <div class="">
            <p>推荐赛事</p>
        </div>
        <div style="height:300px;width:280px;overflow: hidden; ">
            <ul style="height: 100%">

                <?php foreach($tuijian as $key=>$val){ ?>
                    <li style="float: left;  list-style: none; margin-top: 5px; ">
                        <div style=" height:69px; width:280px; border: 1px seagreen solid">

                            <a href="index.php?r=site/content&id=<?php echo $val->id ?>"" ><img style="float: left;" width="100px;" height="67px;" src="<?php echo $val->event_img ?>"/></a>
                            <div class="float" style="margin-top: 20px; margin-left: 10px">
                                <a href="index.php?r=site/content&id=<?php echo $val->id ?>" ><p><?php echo $val->event_name ?></p></a>

                            </div>



                        </div>
                    </li>
                <?php }?>





            </ul>




            <div style="clear: left"></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>








