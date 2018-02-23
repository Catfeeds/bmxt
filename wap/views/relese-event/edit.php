<?php
use wenyuan\ueditor\Ueditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
echo Ueditor::widget(['id'=>'newstext1']);
$connection = Yii::$app->db;
$a = msqyl_real_escape_string('newstext1');
$sql = "insert into bm_relese_event SET wenzhang='$a '";

$command = $connection->createCommand($sql);
$result = $command->execute();
?>
