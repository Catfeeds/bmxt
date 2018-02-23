<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model frontend\models\User */

//$this->title = '将要修改的用户: ' . ' ' . $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];

$this->registerCssFile('css/form.css');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
