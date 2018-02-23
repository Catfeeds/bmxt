<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 2015/11/30
 * Time: 11:16
 */
$this->registerCssFile('css/phone.css');
?>
<div class="main">
    <?php foreach($model as $key=>$val){ ?>
    <div class="litter">
        <h4><?php echo $val->event_name ?></h4>
        <div class="content">
            <div class="image"><a href="index.php?r=site/phones&id=<?php echo $val->id ?>"><img src="<?php echo $val->event_img ?>" /></a></div>
            <div class="font">
                <ul>
                    <li>比赛时间：<?php echo $val->begin ?></li>
                    <li>比赛地点：<?php
                        $a=$val->place;
                        $conf[1] = '济南市';
                        $conf[2] = '青岛市';
                        $conf[3] = '淄博市';
                        $a = $conf[$a];//通过配置的数组找到数字对应的中文
                        echo $a;
                        ?></li>
                    <li>报名费用：<span style="color: red;">￥<?php echo $val->apply_money ?></span></li>
                    <li>报名状态：<span style="color: #008000;"><?php
                            $a=$val->is_end;
                            $conf[0] = '进行中';
                            $conf[1] = '已结束';
                            $a = $conf[$a];//通过配置的数组找到数字对应的中文
                            echo $a;
                            ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div>