<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            // 'email:email',
            // 'sex',
            // 'phone',
            // 'phone_code',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'telphone',
            // 'reg_time:datetime',
            // 'birthday',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
