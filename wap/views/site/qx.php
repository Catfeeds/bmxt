<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/16
 * Time: 16:28
 */
$event_id = $_GET['event_id'];
$user_id = Yii::$app->user->getId();
if(!empty($user_id)){
    $connection = Yii::$app->db;

    $sql = "DELETE FROM bm_shoucang WHERE (event_id = $event_id AND user_id=$user_id)";
    $command = $connection->createCommand($sql);
    $result = $command->execute();
    echo "<script>alert('取消收藏成功');window.location.href='index.php?r=site/yonghu' </script>";
}else{
    echo "<script>alert('请先登录');window.location.href='index.php?r=site/login'</script>";
}
