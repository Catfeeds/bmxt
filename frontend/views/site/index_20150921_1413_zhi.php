<?php
use yii\grid\GridView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
$this->registerCssFile('css/index.css');

$connection = Yii::$app->db;
$sql = "select img from bm_img";

$command = $connection->createCommand($sql);

$result = $command->queryAll();
$result1 = $command->queryOne();
print_r($result1);
?>
<img style="position: absolute; left:1px;"  src="../images/banner.jpg"/>
<div class="site-index" style="margin-top: 293px">

    <div class="hot">
        <div class="hot1">
            <p>城市马拉松赛</p>
            <br/>

            <img  src="../images/2015-08-17_173828.png"  alt="hot" align="bottom" />
        </div>
        <div class="hot2">
            <p >
            吉林东邪西毒越野赛主办单位：吉林越野户外联盟
            <br/>
            协办单位：长春跑吧运动俱乐部、吉林穿越户外俱乐部、北华大学、东北电力大学、东软赛客
            <br/>
            赛事报名：跑吧网、益跑网、42旅、吉林越野、长春跑吧、最酷ZUICOOL
            <br/>
            媒体支持:新文化报、跑吧网、益跑网、42旅、最酷ZUICOOL
            </p>
            <p style="margin:0px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="margin:0px;" src="../images/xiaobian.png" />王小编&nbsp;&nbsp;&nbsp;&nbsp;发布时间：2015/08/17</p>
        </div>
        <div class="hot3">
            <p class="hot3p1">活动开始10/24</p>
            <p class="hot3p2" ><a class="hot3a2" href="">我要报名</a></p>
            <p class="hot3p3">活动截止11/24</p>

        </div>
    </div>
    <div class="main" style="min-height: 100%;position: relative">
        <div style="padding-bottom: 60px">
            <?php
            echo '<ul style="height: 100%">';
            foreach($model1 as $key=>$val)
            {

                echo '<li style="float: left;； height: 300px;list-style:none">';
                echo '<div style="height: 300px;width: 225px;margin-left:35px;margin-top: 35px">';
                echo '<img width="225px" height="150px" src="uploads/20140826mzpygk.jpg">';
                echo $val->event_name.'</br>';
                echo '时间：'.$val->apply_time_start.'</br>';
                echo '地点：'.$val->place.'</br>';
                echo '状态：'.'</br>';
                echo '举办方：'.'</br>';
                echo '</br>';
                echo '</div>';
                echo '</li>';

            }
            echo '<div style="clear: left">';
            echo '</div>';
            echo '</ul>';
            ?>
        </div>

        <div style="width: 100%;position: absolute;bottom: 0px">
            <?= LinkPager::widget(['pagination' => $pages]); ?>
        </div>
    </div>

    <div class="link">
        <div class="link1">
            <p>链接</p>
        </div>
        <div class="link2">
            <ul>
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
        <div class="link3">
        </div>
    </div>


</div>
