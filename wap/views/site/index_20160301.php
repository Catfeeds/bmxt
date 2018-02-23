<?php
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = '济南易健绅体育赛事报名系统';
$this->registerCssFile('css/index.css');
$this->registerCssFile('css/artical.css');
$this->registerCssFile('css/notice.css');
//注册banner css文件
$this->registerCssFile('css/banner.css');
//注册banner js文件
$this->registerJsFile('js/banner.js');
$this->registerJsFile('js/tab-content.js');

$connection = Yii::$app->db;
$sql = "select img from bm_img";

$command = $connection->createCommand($sql);

$result = $command->queryAll();
$result1 = $command->queryOne();

$sql='select * from bm_lunbo_img ORDER BY id DESC LIMIT 5';
$data = $connection->createCommand($sql);
$image = $data->queryAll();

$sqla='select * from bm_hezuo_img ORDER BY id DESC';
$dataa = $connection->createCommand($sqla);
$images = $dataa->queryAll();

$sqls = "select id,event_name,event_img,jianjie,apply_time_start,apply_time_end,apply_money,place from bm_relese_event WHERE is_top=1";
$command1 = $connection->createCommand($sqls);
$top = $command1->queryAll();

?>
<!--大图-->
<div class="banner_index" id="banner_index">
    <ul class="imgbox_banner" id="imgbox_banner">
        <?php foreach($image as $key=>$val){ ?>

            <li><a href="<?php echo $val['url'] ?>"><img src="<?php echo $val['img'] ?>"></a></li>

        <?php } ?>

    </ul>
    <ul class="imgnav_banner" id="imgnav_banner">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

<div id="banner_pos"></div>
<!--搜索栏开始-->
<div class="map">
    <div class="search" style="width:310px;">
        <form class="form-horizontal" action="index.php?r=site/serch" method="get">
            <input type="hidden" name="r" value="site/serch"/></input>
            <div class="form-group">
                <div class="col-xs-8" style="margin-left:10px;"><input type="text" class="form-control" placeholder="请输入赛事名称" name="name"></div>
                <div class="text-left">
                    <button type="submit" class="btn btn-success" style="background-color: #2E8B57 ">搜索</button>
                </div>
            </div>
        </form>
    </div>
    <div style="clear: both;"></div>
</div>
<!--搜索栏结束-->
<!--横条-->
<div class="site-index" style="margin-top: 60px">
    <ul id="tab-content">
        <p>赛事类型切换</p>
        <li style="color: #2e8b57; background-color: #ffffff;">个人赛事</li>
        <li>团队赛事</li>
    </ul>
<!--个人比赛-->
    <div class="main" id="individual-competition" style="height: 100%; position: relative; ">

        <div style="">
            <ul style="height: 100%">
            <?php foreach($model1 as $key=>$val){ ?>

                <li style="float: left;  list-style: none; margin-top: 20px;">
                    <div style=" height:152px; width:800px; margin-left: 25px; border: 1px seagreen solid">
                        <a href="index.php?r=site/content&<?php echo 'id='.$val->id;?>" ><img style="float: left;" width="223px;" height="150px;" src="<?php echo $val->event_img ?>"/></a>
                        <div class="float" style="margin-top: 20px; margin-left: 10px;width:330px;overflow:hidden;">
                            <a href="index.php?r=site/content&<?php echo 'id='.$val->id;?>" ><p style="width: 330px;height:20px;overflow: hidden;"><?php echo $val->event_name ?></p></a>
                            <p>报名开始时间：<?php echo $val->apply_time_start ?></p>
                            <p>报名结束时间：<?php echo $val->apply_time_end ?></p>
                            <p style="width: 330px;height:20px;overflow: hidden;">地点：<?php
                                $a=$val->place;
                                $conf[1] = '济南市';
                                $conf[2] = '青岛市';
                                $conf[3] = '淄博市';
                                $a = $conf[$a];//通过配置的数组找到数字对应的中文
                                echo $a;
                                ?></p>

                        </div>
                        <div class="float" style="float: left; margin-top: 20px; margin-left: 10px;">
                            <p>赛事类型：<?php echo $val->type->event_type_name ?></p>
                            <p>报名费用：￥<?php echo $val->apply_money ?>&nbsp;元</p>
                            <p>报名人数：<span style="color:red;"><?php echo $val->number ?></span></p>
                            <p>赛事状态：<span style="color: red"><?php echo $val->state->state ?></span></p>

                        </div>
                        <div style="position:;bottom: 0px; float: right; background: url('uploads/lan.png') no-repeat; width: 49px;height: 48px; margin-top: 102px;">
                            <span style=" color: #ffffff; width:50px; height:50px; display:table-cell; text-align:center; vertical-align:middle;"><?php
                                $a=$val->orgnize;
                                $conf[1] = '民';
                                $conf[2] = '企';
                                $conf[3] = '政';
                                $conf[4] = '公';
                                $a = $conf[$a];//通过配置的数组找到数字对应的中文
                                echo $a;
                                ?></span>
                        </div>
                    </div>
                    <div class="jj"><p style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;赛事简介：<?php echo $val->jianjie ?></p></div>
                </li>
            <?php } ?>
            </ul>
        <div style="width: 100%;">
            <?= LinkPager::widget(['pagination' => $pages]); ?>
        </div>
            <div style="clear: left"></div>
    </div>
</div>
    <!--个人比赛结束-->
<!--团队比赛-->
    <div class="main" id="team-competition" style="height: 100%; position: relative; display: none;">
        <div class="main" id="individual-competition" style="height: 100%; position: relative; ">

            <div style="">
                <ul style="height: 100%">
                    <?php foreach($model2 as $key=>$val){ ?>

                        <li style="float: left;  list-style: none; margin-top: 20px;">
                            <div style=" height:152px; width:800px; margin-left: 25px; border: 1px seagreen solid">
                                <a href="index.php?r=site/team-content&<?php echo 'id='.$val->id;?>" ><img style="float: left;" width="223px;" height="150px;" src="<?php echo $val->event_img ?>"/></a>
                                <div class="float" style="margin-top: 20px; margin-left: 10px;width:330px;overflow:hidden;">
                                    <a href="index.php?r=site/team-content&<?php echo 'id='.$val->id;?>" ><p style="width: 330px;height:20px;overflow: hidden;"><?php echo $val->event_name ?></p></a>
                                    <p>报名开始时间：<?php echo $val->apply_time_start ?></p>
                                    <p>报名结束时间：<?php echo $val->apply_time_end ?></p>
                                    <p style="width: 330px;height:20px;overflow: hidden;">地点：<?php
                                        $a=$val->place;
                                        $conf[1] = '济南市';
                                        $conf[2] = '青岛市';
                                        $conf[3] = '淄博市';
                                        $a = $conf[$a];//通过配置的数组找到数字对应的中文
                                        echo $a;
                                        ?></p>

                                </div>
                                <div class="float" style="float: left; margin-top: 20px; margin-left: 10px;">
                                    <p>赛事类型：<?php echo $val->type->event_type_name ?></p>
                                    <p>报名费用：￥<?php echo $val->apply_money ?>&nbsp;元</p>
                                    <p>报名人数：<span style="color:red;"><?php echo $val->number ?></span></p>
                                    <p>赛事状态：<span style="color: red"><?php echo $val->state->state ?></span></p>

                                </div>
                                <div style="position:;bottom: 0px; float: right; background: url('uploads/lan.png') no-repeat; width: 49px;height: 48px; margin-top: 102px;">
                            <span style=" color: #ffffff; width:50px; height:50px; display:table-cell; text-align:center; vertical-align:middle;"><?php
                                $a=$val->orgnize;
                                $conf[1] = '民';
                                $conf[2] = '企';
                                $conf[3] = '政';
                                $conf[4] = '公';
                                $a = $conf[$a];//通过配置的数组找到数字对应的中文
                                echo $a;
                                ?></span>
                                </div>
                            </div>
                            <div class="jj"><p style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;赛事简介：<?php echo $val->jianjie ?></p></div>
                        </li>

                    <?php } ?>
                </ul>
                <div style="width: 100%;">
                    <?= LinkPager::widget(['pagination' => $pages1]); ?>
                </div>
                <div style="clear: left"></div>
            </div>
        </div>
    </div>
    <!--团队比赛结束-->


    <div style="clear: both;"></div>

    <div class="hezuo" id="banner_index">
        <ul class="imgbox_hezuo" id="imgbox_hezuo">
            <?php foreach($images as $key=>$val){ ?>

                <li><a href="<?php echo $val['url'] ?>"><img src="<?php echo $val['img'] ?>"></a></li>

            <?php } ?>

        </ul>
    </div>


