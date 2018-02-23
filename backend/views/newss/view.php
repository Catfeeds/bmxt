<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Newss */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Newss', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newss-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<p style="text-align: center;font-size: 15pt"><?php echo $model->name ?></p>
    <p><?php echo $model->newss ?></p>

</div>
