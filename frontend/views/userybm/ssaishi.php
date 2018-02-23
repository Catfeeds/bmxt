<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/6
 * Time: 10:43
 */
$connection = Yii::$app->db;
$user_id = Yii::$app->user->id;
//print_r($user_id);
/*
 * 收藏的赛事
 */
$sql = "select ysc from bm_userysc where user_id=$user_id";

$command = $connection->createCommand($sql);

$result = $command->queryAll();
?>

<h4>已收藏的赛事</h4>
<ul>
    <?php foreach($result as $key){foreach($key as $v){ ?>
        <li><?php print_r($v) ?></li>
    <?php }} ?>
</ul>