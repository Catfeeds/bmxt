<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sjuser_id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'email:email',
            // 'xingming',
            // 'sex',
            // 'dizhi',
            // 'phone',
            // 'phone_code',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'telphone',
            // 'reg_time:datetime',
            // 'birthday',
            
            [
                'attribute'=>'quanxian',
                'value'=>function ($model){
                    if($model->quanxian===0){
                        return '普通用户';
                    }elseif($model->quanxian===1){
                        return '发布用户';
                    }else{
                        return '公司用户';
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
