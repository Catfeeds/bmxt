<?php

use yii\helpers\Html;


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
