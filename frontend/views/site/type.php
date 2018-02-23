<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

?>
<div class="site-about">
    <div class="main" style="min-height: 100%;position: relative; height: 770px;">

        <div style="padding-bottom: 60px; width: 80%;padding-top: 20px; margin: auto">
            <ul style="height: 80%">
                <?php foreach($model as $key=>$val){ ?>

                    <li style="float: left; height: 300px; list-style: none; margin-top: 20px;">
                        <div style="height: 300px; width:225px; margin-left: 42px; border: 1px seagreen solid">
                            <a href="index.php?r=site/content&<?php echo 'id='.$val->id;?>" ><img style="float: left;" width="223px;" height="150px;" src="<?php echo $val->event_img ?>"/></a>
                            <a href="index.php?r=site/content&<?php echo 'id='.$val->id;?>" ><p><?php echo $val->event_name ?></p></a>
                            <p>时间：<?php echo $val->apply_time_start ?></p>
                            <p>地点：<?php echo $val->place ?></p>
                            <p>状态：<span style="color: red"><?php echo $val->event_name ?></span></p>
                            <div style="float: right; background: url('/frontend/web/uploads/lan.png') no-repeat; width: 49px;height: 48px; margin-top: -20px;">
                                <span style=" color: #ffffff; width:50px; height:50px; display:table-cell; text-align:center; vertical-align:middle;">政</span>
                            </div>


                        </div>
                    </li>




                <?php } ?>
            </ul>

            <div style="clear: left"></div>

            <div style="width: 100%;position: absolute;bottom: 0px;top: 670px; margin:auto; ">
                <?= LinkPager::widget(['pagination' => $pages]); ?>
            </div>

        </div>

</div>
