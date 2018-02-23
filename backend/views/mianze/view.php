<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Mianze */


$this->params['breadcrumbs'][] = ['label' => '免责声明', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mianze-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>


    <p><?php echo $model->mianze ?></p>

</div>
