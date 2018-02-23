<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\users */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'username',
           // 'auth_key',
            //'password_hash',
           // 'password_reset_token',
            //'email:email',
            //'xingming',
           // 'sex',
           // 'dizhi',
            //'phone',
            //'phone_code',
           // 'status',
            //'created_at',
            //'updated_at',
            //'telphone',
           // 'reg_time:datetime',
            //'birthday',
            'quanxian',
        ],
    ]) ?>
    <p><a class="btn btn-default" href="index.php?r=users">返回</a></p>

</div>
