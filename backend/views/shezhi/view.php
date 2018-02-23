<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\shezhi */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shezhi-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'title',
            'logo',
            'daohang',
        ],
    ]) ?>

</div>
