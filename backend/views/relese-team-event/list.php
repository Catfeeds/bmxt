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

$this->title = '报名中赛事';
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
        'filterModel' => $searchModel, //搜索
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
            
            //小智 地点
            [
                'attribute'=>'event_type',
                'value'=>function ($model){
                    if($model->event_type==1){
                        return "马拉松";
                    }elseif($model->event_type==2){
                        return "路跑";
                    }elseif($model->event_type==3){
                        return "越野跑";
                    }elseif($model->event_type==4){
                        return "自行车";
                    }elseif($model->event_type==5){
                        return "铁人三项";
                    }elseif($model->event_type==6){
                        return "户外运动";
                    }elseif($model->event_type==7){
                        return "滑雪";
                    }elseif($model->event_type==8){
                        return "篮球";
                    }elseif($model->event_type==9){
                        return "足球";
                    }elseif($model->event_type==10){
                        return "高尔夫";
                    }elseif($model->event_type==11){
                        return "羽毛球";
                    }elseif($model->event_type==12){
                        return "网球";
                    }elseif($model->event_type==13){
                        return "乒乓球";
                    }elseif($model->event_type==14){
                        return "桌球";
                    }elseif($model->event_type==15){
                        return "游泳";
                    }elseif($model->event_type==16){
                        return "越野跑";
                    }elseif($model->event_type==17){
                        return "休闲体育";
                    }elseif($model->event_type==18){
                        return "其它";
                    }
                }
            ],
            'apply_time_start',
            // 'apply_time_end',
            // 'place',
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
