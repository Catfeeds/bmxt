<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\users */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('完善资料', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'username',
           // 'auth_key',
           // 'password_hash',
           // 'password_reset_token',
            'email:email',
            'dizhi',
            //'status',
           // 'created_at',
           // 'updated_at',
            'telphone',
           // 'reg_time:datetime',
            'birthday',
            'sex',
            //'quanxian',
        ],
    ]) ?>

</div>
