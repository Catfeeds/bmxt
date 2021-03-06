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

$sqls = "select id,event_name,event_img,jianjie,apply_time_start,apply_time_end,apply_money,place from bm_relese_event WHERE is_top=1";
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
                比赛地点：<?php echo $val['place'] ?>&nbsp;&nbsp;&nbsp;报名费用：￥<?php echo $val['apply_money'] ?>
            </p>
        </div>
        <div class="hot3">
            <p style="line-height: 50px;">报名开始时间：<?php echo $val['apply_time_start'] ?></p>
            <p style="font-size: 45px; line-height: 118px;"><a href="index.php?r=site/content&id=<?php echo $val['id'] ?>">我要报名</a></p>
            <p style="line-height: 50px;">报名截止时间：<?php echo $val['apply_time_end'] ?></p>
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
                            <span style=" color: #ffffff; width:50px; height:50px; display:table-cell; text-align:center; vertical-align:middle;"><?php
                                $a=$val->orgnize;
                                $conf[1] = '民';
                                $conf[2] = '企';
                                $conf[3] = '政';
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

        <div class="search" style="width:310px; height: 310px; margin-top: 15px;">
            <form class="form-horizontal" action="index.php?r=site/serch" method="get">
<!--                <input type="hidden" name="YII_CSRF_TOKEN" value="--><?php //echo Yii::$app->request->getCsrfToken(); ?><!--"/>-->
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">主办方:</label>
                    <div class="text-left">
                        <label  class="checkbox-inline"><input name="organiz" type="checkbox" value="3" />政府</label>
                        <label  class="checkbox-inline"><input name="organiz" type="checkbox" value="2" />企业</label>
                        <label  class="checkbox-inline"><input name="organiz" type="checkbox" value="1" />民间</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">类型:</label>
                    <div class="col-sm-8 ">
                        <select multiple class="form-control">
                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>                            <option>请选择类型</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">时间:</label>
                    <div class="text-left">
                        <label class="checkbox-inline">
                            <input name="time" type="checkbox" value="" />已结束
                        </label>
                        <label  class="checkbox-inline">
                            <input name="time" type="checkbox" value="" />三天内
                        </label>
                        <label  class="checkbox-inline">
                            <input name="time" type="checkbox" value="" />一周内
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">地点:</label>
                    <div class="text-left">
                        <label class="checkbox-inline">
                            <input name="time" type="checkbox" value="济南" />济南
                        </label>
                        <label  class="checkbox-inline">
                            <input name="time" type="checkbox" value="青岛" />青岛
                        </label>
                        <label  class="checkbox-inline">
                            <input name="time" type="checkbox" value="淄博" />淄博
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-3 control-label">费用:</label>
                    <div class="text-left">
                        <label  class="checkbox-inline"><input name="price" type="checkbox" value="0" />免费</label>
                        <label  class="checkbox-inline"><input name="price" type="checkbox" value="1" />收费</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8" style="margin-left:10px;"><input type="text" class="form-control" placeholder="请输入赛事名称" ></div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-success" style="background-color: #2E8B57 ">搜索</button>
                    </div>
                </div>
            </form>
        </div>

        <div style="clear: both;"></div>


        <div class="topnewsbox" >
            <div class="topnews">
                <div class="topnewslist">
                   <p style="margin-left: 20px;margin-top: 10px">公告须知</p>
                    <ul>
                        <?php foreach($news as $key=>$val){ ?>
                            <li><a class="up" id="focus_<?php echo $val->id ?>" href="index.php?r=news/view&id=<?php echo $val->id ?>" target="_blank"><?php echo $val->name ?></a></li>
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
            <img src="/frontend/images/er.png" class="er" />
            <p class="ma">扫描官方二维码<br/>最新赛事进掌中</p>
        </div>
    </div>
    <!--phone的div放map里面-->




    <div style="clear: both;"></div>



