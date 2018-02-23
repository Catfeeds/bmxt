<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\User;
/* @var $this yii\web\View */
/* @var $model frontend\models\FamilyTeam */

?>

<div class="family-team-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'id',
            'user_id',
            'family_team_id',
            'family_team_name',
            'family_team_num',
            'family_team_content',
        ],
    ]) ?>

</div>
