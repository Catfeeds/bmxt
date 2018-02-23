<?php
use yii\grid\GridView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = '济南易健绅体育赛事报名系统';
$this->registerCssFile('css/index.css');
$this->registerCssFile('css/news.css');
//注册banner css文件
$this->registerCssFile('css/banner.css');
//注册banner js文件
$this->registerJsFile('js/banner.js');
$this->registerJsFile('js/index_position.js');

$connection = Yii::$app->db;
$sql = "select img from bm_img";

$command = $connection->createCommand($sql);

$result = $command->queryAll();
$result1 = $command->queryOne();

$sql='select img from bm_lunbo_img ORDER BY id DESC ';
$data = $connection->createCommand($sql);
$image = $data->queryAll();

$sqls = "select id,event_name,event_img,jianjie from bm_relese_event WHERE is_top=1";
$command1 = $connection->createCommand($sqls);
$top = $command1->queryAll();

?>

<div class="banner_index" id="banner_index">
    <ul class="imgbox_banner" id="imgbox_banner">
        <?php foreach($image as $img){ ?>
           <?php foreach($img as $im){ ?>
            <li><img src="<?php echo $im ?>"></li>
            <?php } ?>
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
        <p style="color:#33aaef;font-size:20px;"><?php echo $val['event_name'] ?></p>
        <div class="hot1">

            <br/>

            <img  src="<?php echo $val['event_img'] ?>"  alt="hot" align="bottom" width="225px;" height="150px;" />
        </div>
        <div class="hot2">
            <p >
            <?php echo $val['jianjie'] ?>
            </p>
            <p style="margin:0px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="margin:0px;" src="../images/xiaobian.png" />王小编&nbsp;&nbsp;&nbsp;&nbsp;发布时间：2015/08/17</p>
        </div>
        <div class="hot3">
            <p class="hot3p1">活动开始10/24</p>
            <p class="hot3p2" ><a class="hot3a2" href="index.php?r=site/content&id=<?php echo $val['id'] ?>">我要报名</a></p>
            <p class="hot3p3">活动截止11/24</p>

        </div>
    </div>
    <?php } ?>

    <div class="slt">
        <div class="slt_type" id="slt_type"><span>地点：</span></div>
        <div class="slt_all" id="slt_all"><a href="javascript:void (0);">不限</a></div>
        <ul class="slt_list" id="slt_list">
            <li><a href="javascript:void (0);">济南市</a></li>
            <li><a href="javascript:void (0);">青岛市</a></li>
            <li><a href="javascript:void (0);">淄博市</a></li>
        </ul>
    </div>

    <div class="main" style="min-height: 100%;position: relative; ">

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
                            <p style="width: 330px;height:20px;overflow: hidden;">地点：<?php echo $val->place ?></p>

                        </div>
                        <div class="float" style="float: left; margin-top: 20px; margin-left: 10px;">
                            <p>赛事类型：<?php echo $val->type->event_type_name ?></p>
                            <p>报名费用：￥<?php echo $val->apply_money ?>&nbsp;元</p>
                            <p>报名人数：<span style="color:red;"><?php echo $val->number ?></span></p>
                            <p>赛事状态：<span style="color: red"><?php echo $val->state->state ?></span></p>

                        </div>
                        <div style="position:;bottom: 0px; float: right; background: url('uploads/lan.png') no-repeat; width: 49px;height: 48px; margin-top: 102px;">
                            <span style=" color: #ffffff; width:50px; height:50px; display:table-cell; text-align:center; vertical-align:middle;">政</span>
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

 <!--phone的div放map里面-->
    <div class="map">
        <script type="text/javascript">
            var CurrentHotScreen = 0 ;

            function setHotQueryList(screen){
                var Vmotion = "forward" ;
                var MaxScreen = 7 ;
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
        <div class="topnewsbox" >
            <div class="topnews">
                <div class="topnewslist">
                   <p style="margin-left: 20px;margin-top: 10px">公告须知</p>
                    <ul>
                        <?php foreach($news as $key=>$val){ ?>
                            <li><a class="up" id="focus_<?php echo $val->id ?>" href="index.php?r=news/view&id=<?php echo $val->id ?>" target="_blank"><?php echo $val->news ?></a></li>
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

            <div class="topnewsbg"></div>

        </div>
        <div class="phone">
            <div class="float er">
                <img src="/frontend/images/er.png" class="float" />
                <p class="ma">扫描官方二维码，实时了解最新赛事</p>
            </div>
        </div>
    </div>
    <!--phone的div放map里面-->




    <div style="clear: both;"></div>
    <div class="link" >
        <div class="link1">
            <p>友情链接</p>
        </div>
        <div class="link2">
            <a href="http://www.sdty.gov.cn/">山东省体育局</a>
            <a href="http://www.xzjwh.com/">济南新知觉文化传播有限公司</a>
            <a href="http://www.yijianshen.net/">易健绅体育健身服务平台</a>
            <a href="http://jn.yijianshen.net/">国华东方美郡游泳馆</a>
            <a href="http://www.facetoworld.net/">济南邮政-横扫全城</a>
            <a href="http://www.jnsports.cn/">济南全民健身网</a>

            <ul style="display: none;">
                <?php
                $sql='select name,link from bm_friends_link';
                $data = $connection->createCommand($sql);
                $links = $data->queryAll();
               foreach ($links as $link) {
                   foreach($link as $name){
                        echo '<li style="float: left;list-style:none;padding: 10px ">'.$name.'</li>';
                    }
                }

                ?>
            </ul>
        </div>

    </div>


