<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p><a class="btn btn-default" href="index.php?r=relese/create">发布赛事</a></p>-->
<!--    <p><a class="btn btn-default" href="index.php?r=relese/index">赛事管理</a></p>-->
    <p><a class="btn btn-default" href="index.php?r=users">用户管理</a></p>
<!--    --><?php
//     echo '<p><a class="btn btn-default" href="index.php?r=users/view&id='.Yii::$app->user->id.'">个人资料</a></p>';
//    ?>
<!--    <p><a class="btn btn-default" href="">报表下载</a></p>-->
<!--    <p><a class="btn btn-default" href="index.php?r=site/xitong">系统设置</a></p>-->

</div>
