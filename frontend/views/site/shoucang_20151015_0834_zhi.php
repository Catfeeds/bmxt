<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/10
 * Time: 14:02
 */
$event_id = $_GET['event_id'];
$user_id = Yii::$app->user->getId();

if(!empty($user_id))
{
    $connection = Yii::$app->db;

    $sql = "update bm_user set event_id = CONCAT(event_id,',$event_id') WHERE id = $user_id";
    $command = $connection->createCommand($sql);
    $result = $command->execute();
    echo "<script>alert('收藏成功');window.location.href='index.php?r=site/content&id=$event_id' </script>";
}else{
    echo "<script>alert('请先登录');window.location.href='index.php?r=site/login' </script>";
}
