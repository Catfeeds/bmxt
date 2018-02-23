<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAdmin */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-admin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'username',
           // 'auth_key',
            //'password_hash',
           // 'password_reset_token',
           // 'email:email',
           // 'status',
           // 'created_at',
           // 'updated_at',
           // 'telphone',
           // 'reg_time:datetime',
           // 'birthday',
           // 'sex',
            'quanxian',
            'xitong',
            'yonghu',
            'caiwu',
            'guanggao',
            'tupian',
            'wenzhang',
            'saishi',
        ],
    ]) ?>

</div>
