<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ReleseEvent */

$this->title = $model->event_name;


?>
<div class="relese-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--去掉删除按钮 shine_20151020-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'event_name',
            'addit',
            'event_type',
            'apply_time_start',
            'apply_time_end',
            'place',
            'contact_name',
            'contact_phone',
            'contact_emaill:email',
            'orgnize',
            'orgnize_name',
            'extend_id',
            'is_extends',
        ],
    ]) ?>
    <table class="table table-striped table-bordered detail-view">
        <tbody>
            <tr>
                <th>已报名人数</th>
                <td>1</td>
            </tr>
            <tr>
                <th>已收报名费</th>
                <td></td>
            </tr>
            <tr>
                <th>年龄分布</th>
                <td></td>
            </tr>
            <tr>
                <th>性别分布</th>
                <td></td>
            </tr>
        </tbody>
    </table>

</div>
