<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = '用户中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php
    echo'<p><a class="btn btn-default" href="index.php?r=userybm/saishi">我的赛事</a></p>'
    ?>
    <?php
    echo '<p><a class="btn btn-default" href="index.php?r=ziliao/view&id='.Yii::$app->user->id.'">个人资料</a></p>';
    ?>

    <p><a class="btn btn-default" href="index.php?r=userybm/ssaishi">收藏过的赛事</a></p>

    
</div>
