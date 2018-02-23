<?php

use yii\helpers\Html;

$cssString="
    body{
        background:url(/css/images/beijing13.png) no-repeat ;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
    }
    .breadcrumb{
        display:none;
        margin:0px;
    }
    .jgsignup-create{
        width:500px;
        margin:50px auto 0px;
    }
    .jgsignup-create > h1{
        text-align:center;
    }

";
$this->registerCss($cssString);
/* @var $this yii\web\View */
/* @var $model frontend\models\Jgsignup */

$this->title = '机构注册';
//$this->params['breadcrumbs'][] = ['label' => 'Jgsignups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jgsignup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
