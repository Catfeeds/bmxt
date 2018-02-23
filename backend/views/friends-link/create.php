<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FriendsLink */

$this->title = '创建新友情链接';
$this->params['breadcrumbs'][] = ['label' => '友情链接', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friends-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
