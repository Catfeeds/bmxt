<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->registerCssFile('css/index.css');
?>
<div class="site-about" style="width: 50%">
    <div class="main" style="min-height: 100%; margin: auto">

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



            <div style="width: 100%; margin: auto">
                <?= LinkPager::widget(['pagination' => $pages]); ?>
            </div>
            <div style="clear: left"></div>
        </div>
    </div>

</div>
