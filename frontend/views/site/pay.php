<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->registerCssFile('css/index.css');
$this->registerCssFile('css/news.css');
//注册banner css文件
$this->registerCssFile('css/banner.css');
?>
<div class="site-about" style="width: 100%">
    <div class="main" style="min-height: 100%;position: relative; ">

        <div style="">
            <ul style="height: 100%">
                <?php foreach($model as $key=>$val){ ?>

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

    <!--phone的div放map里面-->
    <div class="map">


        <div class="search" style="width:310px; height: 340px; margin-top: 15px;">
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

    </div>
</div>
