<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jgsignup */

$this->title = $model->jgname;
$this->params['breadcrumbs'][] = ['label' => '机构申请', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jgsignup-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('分配', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'jgname',
            'dizhi',
            'jguser',
            'phone',
            'email:email',
            'sffpzh',
            'fpzhmm',
        ],
    ]
    );
        echo "机构证明：<img src='http://www.51first.cn/$model->img' width='200px;' height='200px;'/>";



    ?>

</div>
