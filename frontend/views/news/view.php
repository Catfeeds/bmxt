<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$cssString="
    body{
        background:url(/images/multi_back.png) no-repeat ;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
        }
    .breadcrumb{
        display:none;
    }
    .news-view{
        ;
    }
    .news-view > h1{
        text-align:center;
        padding: 30px 0px 10px;
    }
    .news-view > div{
        border-top: 1px solid #cccccc;
        padding: 0px 20px;
    }
";
$this->registerCss($cssString);

/* @var $this yii\web\View */
/* @var $model frontend\models\News */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '新闻', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div >
        <?php
        echo $model['news'];
        ?>
    </div>

</div>
