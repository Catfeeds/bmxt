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
            //小智 是否审核
            [
                'attribute'=>'addit',
                'value'=>function ($model){
                    return $model->addit===1?'是':'否';
                }
            ],
            //'event_type',
            'apply_time_start',
            'apply_time_end',
            //小智 地点
            [
                'attribute'=>'place',
                'value'=>function ($model){
                    if($model->place==1){
                        return "济南市";
                    }elseif($model->place==2){
                        return "青岛市";
                    }elseif($model->place==3){
                        return "淄博市";
                    }else{
                        return "潍坊市";
                    }
                }
            ],
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
