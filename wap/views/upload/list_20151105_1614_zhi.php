<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/6
 * Time: 15:25
 */
$connection = Yii::$app->db;

/*
 * 路径存到数据库
 */

$sql = "select img from bm_img";

$command = $connection->createCommand($sql);

$result = $command->queryAll();

//print_r($result);

?>
<?php foreach(array_reverse($result) as $k){ foreach($k as $v){ ?>
<img src="<?php echo $v ?>" width="350px" height="350px" style="margin-left: 10px; margin-bottom: 10px;" />
<?php }} ?>