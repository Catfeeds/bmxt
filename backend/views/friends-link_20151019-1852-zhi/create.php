<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FriendsLink */

$this->title = 'Create Friends Link';
$this->params['breadcrumbs'][] = ['label' => 'Friends Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friends-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
