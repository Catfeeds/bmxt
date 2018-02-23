<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->registerCssFile('css/zhanshi.css');
$this->registerCssFile('css/news.css');
//注册banner css文件
$this->registerCssFile('css/banner.css');
?>
<div class="site-about" style="width: 100%">
    <div class="main" style="min-height: 100%;margin: auto; ">

        <div style="margin:0 auto;">
            <ul style="height: 100%">
                <?php foreach($model as $key=>$val){ ?>

                    <li style="float: left;  list-style: none; margin-top: 20px;">
                        <div style=" height:152px; width:800px; margin-left: 25px; border: 1px seagreen solid">
                          <img style="float: left;" width="223px;" height="150px;" src="<?php echo $val->img ?>"/>
                            <div class="float" style="margin-top: 20px; margin-left: 10px;width:330px;overflow:hidden;">
                                <?php echo $val->name ?>
                                <p>简介：<?php echo $val->jianjie ?></p>
                            </div>
                        </div>
                        <div class="jj"><p style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;介绍：<?php echo $val->jieshao ?></p></div>
                    </li>

                <?php } ?>
            </ul>

            <div style="width: 100%;">
                <?= LinkPager::widget(['pagination' => $pages]); ?>
            </div>
            <div style="clear: left"></div>
        </div>
    </div>

</div>
