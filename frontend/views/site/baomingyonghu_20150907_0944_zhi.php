<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = '用户中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>


    <p><a class="btn btn-default" href="index.php?r=relese/bmindex">报名比赛</a></p>

    <?php

    if (Yii::$app->user->id <5) {

        echo Yii::$app->getUser(Yii::$app->user->id)->id;
    } else {
        echo 1;
    }
    ?>
</div>
