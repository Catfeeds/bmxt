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
?>
<div class="site-about">

<!--    --><?php
//    echo'<p><a class="btn btn-default" href="index.php?r=userybm/saishi">我的赛事</a></p>'
//    ?>
<!--    --><?php
//    echo '<p><a class="btn btn-default" href="index.php?r=ziliao/view&id='.Yii::$app->user->id.'">个人资料</a></p>';
//    ?>
<!---->
<!--    <p><a class="btn btn-default" href="index.php?r=userybm/ssaishi">收藏过的赛事</a></p>-->

    
</div>
<div class="main">
    <ul class="main_l">
        <li class="main_l1" id="main_l1">个人资料</li>
        <li class="main_l2" id="main_l2">报名赛事</li>
        <li class="main_l3" id="main_l3">收藏夹</li>
    </ul>
    <div class="main_r">
        <!--<p class="main1_p1">1602445</p>-->
        <!--<p>用户签名：怎么可以真么懒，快去留下签名吧</p>-->
        <!--<p>资料完善度：10%&nbsp完善资料 </p>-->
        <!--<p>-->
        <!--<span>赛事信息：</span>-->
        <!--<span>已发布成绩（0）</span>-->
        <!--<span>已报名（0）</span>-->
        <!--<span>收藏的赛事（0）</span>-->
        <!--<span>可能感兴趣的赛事（0）</span>-->
        <!--</p>-->
        <table class="user_data" id="user_data">
            <tr>
                <td class="user_data_l">姓名</td>
                <td>：</td>
                <?php foreach($usernamer as $k){foreach($k as $v){ ?>
                <td class="user_data_r"><?php echo $v ?></td>
                <?php }} ?>
            </tr>
            <tr>
                <td class="user_data_l">性别</td>
                <td>：</td>

                <?php foreach($sexr as $k){foreach($k as $v){ ?>
                    <td class="user_data_r"><?php echo $v ?></td>
                <?php }} ?>
            </tr>
            <tr>
                <td class="user_data_l">出生日期</td>
                <td>：</td>

                <?php foreach($birthdayr as $k){foreach($k as $v){ ?>
                    <td class="user_data_r"><?php echo $v ?></td>
                <?php }} ?>
            </tr>
            <tr>
                <td class="user_data_l">Email</td>
                <td>：</td>

                <?php foreach($emailr as $k){foreach($k as $v){ ?>
                    <td class="user_data_r"><?php echo $v ?></td>
                <?php }} ?>
            </tr>
            <tr>
                <td class="user_data_l">手机号</td>
                <td>：</td>

                <?php foreach($phoner as $k){foreach($k as $v){ ?>
                    <td class="user_data_r"><?php echo $v ?></td>
                <?php }} ?>
            </tr>
            <tr>
                <td class="user_data_l">通信地址</td>
                <td>：</td>

                <?php foreach($dizhir as $k){foreach($k as $v){ ?>
                    <td class="user_data_r"><?php echo $v ?></td>
                <?php }} ?>
            </tr>
            <tr>
                <td>
                    <?php
                    echo '<p><a style="width: 50px; height: 50px; background: #0088e4; color: #ffffff; display:table-cell; text-align:center; vertical-align:middle;" href="index.php?r=ziliao/update&id='.Yii::$app->user->id.'">修改</a></p>';
                    ?>
                </td>
            </tr>
        </table>
        <div class="comptt" id="comptt">
            <button class="selector1" id="selector1">已报名赛事</button>
            <button class="selector2" id="selector2">获奖的赛事</button>
            <div class="inprogress" id="inprogress">
                <div class="comptt1">
                    <img src="/frontend/web/images/comptt_1.gif"/>
                    <div class="desc">
                        <h1>青岛国际马拉松赛</h1
                        <p>主办方：青岛体育总会</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </div>
                <div class="comptt1">
                    <img src="/frontend/web/images/comptt_1.gif"/>
                    <div class="desc">
                        <h1>青岛国际马拉松赛</h1>
                        <p>主办方：青岛体育总会</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </div>
                <div class="comptt1">
                    <img src="/frontend/web/images/comptt_1.gif"/>
                    <div class="desc">
                        <h1>青岛国际马拉松赛</h1>
                        <p>主办方：青岛体育总会</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </div>
            </div>
            <div class="ended" id="ended">
                <div class="comptt1">
                    <img src="/frontend/web/images/comptt_2.gif"/>
                    <div class="desc">
                        <h1>黄山速登赛</h1>
                        <p>主办方：青岛体育总会</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </div>
                <div class="comptt1">
                    <img src="/frontend/web/images/comptt_2.gif"/>
                    <div class="desc">
                        <h1>黄山速登赛</h1>
                        <p>主办方：青岛体育总会</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </div>
                <div class="comptt1">
                    <img src="/frontend/web/images/comptt_2.gif"/>
                    <div class="desc">
                        <h1>黄山速登赛</h1>
                        <p>主办方：青岛体育总会</p>
                        <p>时间：2015/08/15-2015/08/16</p>
                        <p>地点：青岛市李沧区园博园</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="favor" id="favor">
            <div class="comptt1">
                <img src="/frontend/web/images/comptt_3.png"/>
                <div class="desc">
                    <h1>横渡黄河速度赛</h1>
                    <p>主办方：青岛体育总会</p>
                    <p>时间：2015/08/15-2015/08/16</p>
                    <p>地点：青岛市李沧区园博园</p>
                </div>
            </div>
            <div class="comptt1">
                <img src="/frontend/web/images/comptt_3.png"/>
                <div class="desc">
                    <h1>横渡黄河速度赛</h1>
                    <p>主办方：青岛体育总会</p>
                    <p>时间：2015/08/15-2015/08/16</p>
                    <p>地点：青岛市李沧区园博园</p>
                </div>
            </div>
            <div class="comptt1">
                <img src="/frontend/web/images/comptt_3.png"/>
                <div class="desc">
                    <h1>横渡黄河速度赛</h1>
                    <p>主办方：青岛体育总会</p>
                    <p>时间：2015/08/15-2015/08/16</p>
                    <p>地点：青岛市李沧区园博园</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ad"></div>
<div class="link">
    <div class="link1">
        <p>友情链接</p>
    </div>
    <table class="link2">
        <tr>
            <td><a href="*">济南易健身</a></td>
            <td><a href="*">济南泉游游泳馆</a></td>
            <td><a href="*">淄博体育中心</a></td>
            <td><a href="*">济南全民健身</a></td>
            <td><a href="*">济南出版社</a></td>
        </tr>
        <tr>
            <td><a href="*">济南易健身</a></td>
            <td><a href="*">济南泉游游泳馆</a></td>
            <td><a href="*">淄博体育中心</a></td>
            <td><a href="*">济南全民健身</a></td>
            <td><a href="*">济南出版社</a></td>
        </tr>
        <tr>
            <td><a href="*">济南易健身</a></td>
            <td><a href="*">济南泉游游泳馆</a></td>
            <td><a href="*">淄博体育中心</a></td>
            <td><a href="*">济南全民健身</a></td>
            <td><a href="*">济南出版社</a></td>
        </tr>
        <tr>
            <td><a href="*">济南易健身</a></td>
            <td><a href="*">济南泉游游泳馆</a></td>
            <td><a href="*">淄博体育中心</a></td>
            <td><a href="*">济南全民健身</a></td>
            <td><a href="*">济南出版社</a></td>
        </tr>
    </table>
    <div class="link3">
        <img src="/frontend/web/images/two-dim_code.gif"/>
    </div>
</div>
