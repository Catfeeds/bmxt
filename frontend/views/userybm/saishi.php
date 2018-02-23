<?php
$connection = Yii::$app->db;
$user_id = Yii::$app->user->id;
//print_r($user_id);
/*
 * 报名的赛事
 */
$sql = "select ybm from bm_userybm where user_id=$user_id";

$command = $connection->createCommand($sql);

$result = $command->queryAll();
/*
 * 获奖的赛事
 */
$sql_yhj = "select yhj from bm_useryhj where user_id=$user_id";

$command_yhj = $connection->createCommand($sql_yhj);

$result_yhj = $command_yhj->queryAll();
//print_r($result);
//echo "<br/>";

//foreach($result as $key)
//{
//    //print_r($key);
//
//    foreach($key as $v)
//    {
//        print_r($v);
//        echo "<br/>";
//    }
//}

?>
<h4>已报名的赛事</h4>
<ul>
    <?php foreach($result as $key){foreach($key as $v){ ?>
    <li><?php print_r($v) ?></li>
    <?php }} ?>
</ul>
<h4>获奖的赛事</h4>
<ul>
    <?php foreach($result_yhj as $key){foreach($key as $v){ ?>
        <li><?php print_r($v) ?></li>
    <?php }} ?>
</ul>
<ul>
    <li><a href="index.php?r=upload/upload">发布赛事</a></li>
</ul>