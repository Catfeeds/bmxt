﻿<?php
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



<div class="site-index" style="margin-top: 30px">
<?php foreach($top as $key=>$val){ ?>
    <div class="hot">
        <a href="index.php?r=site/content&id=<?php echo $val['id'] ?>">
            <img class="hot1" alt="hot" src="<?php echo $val['event_img'] ?>"/>
        </a>
        <div class="hot2">
            <p style="text-align: center; height: 62px; font-size: 22px; font-weight: 700; padding: 20px 0px;">
                <a href="index.php?r=site/content&id=<?php echo $val['id'] ?>"><?php echo $val['event_name'] ?></a>
            </p>
            <p>
                <?php echo $val['jianjie'] ?>
            </p>
            <p style="text-align: center;">
                比赛地点：<?php
                $a=$val['place'];
                $conf[1] = '济南市';
                $conf[2] = '青岛市';
                $conf[3] = '淄博市';
                $a = $conf[$a];//通过配置的数组找到数字对应的中文
                echo $a;
                ?>&nbsp;&nbsp;&nbsp;报名费用：￥<?php echo $val['apply_money'] ?>
            </p>
        </div>
        <div class="hot3">
            <p style="line-height: 50px;">报名开始时间：<?php echo $val['apply_time_start'] ?></p>
            <p style="font-size: 45px; line-height: 118px;"><a href="index.php?r=site/content&id=<?php echo $val['id'] ?>">我要报名</a></p>
            <p style="line-height: 50px;">报名截止时间：<?php echo $val['apply_time_end'] ?></p>
        </div>
    </div>
<?php } ?>

<!--    <div class="slt">-->
<!--        <img alt="横条广告图" src="/images/slt.jpg" style="width: 100%;">-->
<!--    </div>-->
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

 <!--phone的div放map里面-->
    <div class="map">
        <script type="text/javascript">
            var CurrentHotScreen = 0 ;

            function setHotQueryList(screen){
                var Vmotion = "forward" ;
                var MaxScreen = 6 ;
                if(screen >= MaxScreen){
                    screen = 0 ;
                    Vmotion = "reverse" ;
                }
                cleanallstyle();
                document.getElementById("focus_"+screen).className = "up" ;
                if(null!=hot_query_td.filters){
                    hot_query_td.filters[0].apply();
                    hot_query_td.filters[0].motion = Vmotion;
                }
                for(i=0;i<MaxScreen;i++){
                    document.getElementById("switch_"+i).style.display = "none" ;
                }
                document.getElementById("switch_"+screen).style.display = "block" ;
                if(null!=hot_query_td.filters){
                    hot_query_td.filters[0].play();
                }
                CurrentHotScreen = screen ;
            }

            function refreshHotQuery(){
                refreshHotQueryTimer = null;
                setHotQueryList(CurrentHotScreen+1);
                refreshHotQueryTimer = setTimeout('refreshHotQuery();', 5000);
            }
        </script>

        <div class="search" style="width:310px; height: 100%;">
            <form class="form-horizontal" action="index.php?r=site/serch" method="get">
            <input type="hidden" name="r" value="site/serch"/></input>
<!--                <input type="hidden" name="YII_CSRF_TOKEN" value="--><?php //echo Yii::$app->request->getCsrfToken(); ?><!--"/>-->
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">主办方:</label>
                    <div class="text-left">
                         <label  class="radio-inline"><input name="organiz" type="radio" value="0" checked="" />不限</label>
                        <label  class="radio-inline"><input name="organiz" type="radio" value="1" />民间</label>
                        <label  class="radio-inline"><input name="organiz" type="radio" value="2" />企业</label>
                        <label  class="radio-inline"><input name="organiz" type="radio" value="3" />政府</label>
                        <label  class="radio-inline" style="margin-left: 85px;"><input name="organiz" type="radio" value="4" />公益</label>

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">类型:</label>
                    <div class="col-sm-8 ">
                        <select multiple class="form-control" name="type">
                            <option selected="selected" value="0" name="type">不限</option>
                            <option value="1" name="type">马拉松</option>
                            <option value="2" name="type">路跑</option>
                            <option value="3" name="type">越野跑</option>
                            <option value="4" name="type">自行车</option>
                            <option value="5" name="type">铁人三项</option>
                            <option value="6" name="type">户外运动</option>
                            <option value="7" name="type">滑雪</option>
                            <option value="8" name="type">篮球</option>
                            <option value="9" name="type">足球</option>
                            <option value="10" name="type">高尔夫</option>
                            <option value="11" name="type">羽毛球</option>
                            <option value="12" name="type">网球</option>
                            <option value="13" name="type">乒乓球</option>
                            <option value="14" name="type">桌球</option>
                            <option value="15" name="type">游泳</option>
                            <option value="17" name="type">休闲体育</option>
                            <option value="18" name="type">其它</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">时间:</label>
                    <div class="text-left">
                         <label class="radio-inline">
                            <input name="time" type="radio" value="0" checked="" />不限
                        </label>
                        <label class="radio-inline">
                            <input name="time" type="radio" value="1"  />已结束
                        </label>
                        <label  class="radio-inline">
                            <input name="time" type="radio" value="2" />进行中
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">地点:</label>
                    <div class="text-left">
                         <label class="radio-inline">
                            <input name="place" type="radio" value="0" checked="" />不限
                        </label>
                        <label class="radio-inline">
                            <input name="place" type="radio" value="1" />济南
                        </label>
                        <label  class="radio-inline">
                            <input name="place" type="radio" value="2" />青岛
                        </label>
                        <label  class="radio-inline">
                            <input name="place" type="radio" value="3" />淄博
                        </label>
                        <label class="radio-inline"  style="margin-left: 85px;">
                            <input name="place" type="radio" value="4"/>潍坊
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">费用:</label>
                    <div class="text-left">
                         <label  class="radio-inline"><input name="price" type="radio" value="0" checked="" />不限</label>
                        <label  class="radio-inline"><input name="price" type="radio" value="1" />免费</label>
                        <label  class="radio-inline"><input name="price" type="radio" value="2" />收费</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8" style="margin-left:10px;"><input type="text" class="form-control" placeholder="请输入赛事名称" name="name"></div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-success" style="background-color: #2E8B57 ">搜索</button>
                    </div>
                </div>
            </form>
        </div>

        <div style="clear: both;"></div>

<!--        动态公告开始-->
        <div  class="topnewsbox notice" >
            <div  class="topnewss">
                <div class="topnewslist">
                    <p style="display: none" class="text-center" style="margin:0px;"></p>
                    <ul>
                        <?php foreach($newss as $key=>$val){ ?>
                            <li><a style="" class="up" id="focus_<?php echo $val->id ?>" href="index.php?r=newss/view&id=<?php echo $val->id ?>" target="_blank"><?php echo $val->name ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <p style="padding-bottom: 40px; text-align: right;padding-right: 20px"><a href="index.php?r=newss/index"> 更多>></a></p>
            </div>
            <script type="text/javascript">
                function cleanallstyle(){
                    for(i=0;i<7;i++){
                        document.getElementById("focus_"+i).className = "" ;
                    }
                }
                var refreshHotQueryTimer = null ;
                var hot_query_td =  document.getElementById('hotsearchlist');
                setHotQueryList(CurrentHotScreen);
                refreshHotQueryTimer = setTimeout('refreshHotQuery();', 5000);
            </script>
        </div>
<!--        动态公告结束-->

        <div  class="topnewsbox" >
            <div  class="topnews">
                <div class="topnewslist">
                   <p style="display: none" class="text-center" style="margin:0px;"></p>
                    <ul>
                        <?php foreach($news as $key=>$val){ ?>
                            <li><a style="" class="up" id="focus_<?php echo $val->id ?>" href="index.php?r=news/view&id=<?php echo $val->id ?>" target="_blank"><?php echo $val->name ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <p style="padding-bottom: 40px; text-align: right;padding-right: 20px"><a href="index.php?r=news/index"> 更多>></a></p>
            </div>
            <script type="text/javascript">
                function cleanallstyle(){
                    for(i=0;i<7;i++){
                        document.getElementById("focus_"+i).className = "" ;
                    }
                }
                var refreshHotQueryTimer = null ;
                var hot_query_td =  document.getElementById('hotsearchlist');
                setHotQueryList(CurrentHotScreen);
                refreshHotQueryTimer = setTimeout('refreshHotQuery();', 5000);
            </script>

<!--            <div class="topnewsbg"></div>-->

        </div>


<!--        <div class="phone">-->
<!--            <img src="/images/tw-code.png" class="er" />-->
<!--        </div>-->
    </div>
    <!--phone的div放map里面-->

    <div style="clear: both;"></div>

    <div class="hezuo" id="banner_index">
        <ul class="imgbox_hezuo" id="imgbox_hezuo">
            <?php foreach($images as $key=>$val){ ?>

                <li><a href="<?php echo $val['url'] ?>"><img src="<?php echo $val['img'] ?>"></a></li>

            <?php } ?>

        </ul>
    </div>


