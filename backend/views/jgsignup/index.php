<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '机构申请用户';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jgsignup-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'jgname',
            'dizhi',
            'jguser',
            'phone',
            'email:email',
            // 'img',
             'sffpzh',
             'fpzhmm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
