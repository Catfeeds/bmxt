<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-admin-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
           // 'auth_key',
           // 'password_hash',
            //'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'telphone',
            // 'reg_time:datetime',
            // 'birthday',
            // 'sex',
            [
                'attribute'=>'quanxian',
                'value'=>function ($model){
                    return $model->quanxian===1?'有':'无';
                }
            ],
            [
                'attribute'=>'xitong',
                'value'=>function ($model){
                    return $model->xitong===1?'有':'无';
                }
            ],
            [
                'attribute'=>'yonghu',
                'value'=>function ($model){
                    return $model->yonghu===1?'有':'无';
                }
            ],
            [
                'attribute'=>'caiwu',
                'value'=>function ($model){
                    return $model->caiwu===1?'有':'无';
                }
            ],
            [
                'attribute'=>'guanggao',
                'value'=>function ($model){
                    return $model->guanggao===1?'有':'无';
                }
            ],
            [
                'attribute'=>'tupian',
                'value'=>function ($model){
                    return $model->tupian===1?'有':'无';
                }
            ],
            [
                'attribute'=>'wenzhang',
                'value'=>function ($model){
                    return $model->wenzhang===1?'有':'无';
                }
            ],
            [
                'attribute'=>'saishi',
                'value'=>function ($model){
                    return $model->saishi===1?'有':'无';
                }
            ],
            [
                'attribute'=>'mianze',
                'value'=>function ($model){
                    return $model->mianze===1?'有':'无';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
