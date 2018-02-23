<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
$this->title = '查看队友';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            [
                'label'=>'姓名',
                'format'=>'raw',
                'value' => function($model){
                    $xingming=$model->xingming;
                    return $xingming;
                }
            ],

        ],
    ]); ?>
</div>
