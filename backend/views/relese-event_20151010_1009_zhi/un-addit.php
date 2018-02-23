<?php
/**
 * 文件名 : list.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: list.php  2015/9/6 $
*/
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReleseEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '未审核赛事';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relese-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('发布新赛事', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel, //搜索
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=> 'id',
                'label'=>'编号',
            ],
            'event_name',
            'addit',
            //'event_type',
            'apply_time_start',
            'apply_time_end',
            'place',
            // 'contact_name',
            // 'contact_phone',
            // 'contact_emaill:email',
            // 'orgnize',
            // 'orgnize_name',
            // 'extend_id',
            // 'is_extends',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
