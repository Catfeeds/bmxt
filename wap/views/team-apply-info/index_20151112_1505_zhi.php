<?php

use yii\helpers\Html;
use yii\grid\GridView;
$cssString="
    .breadcrumb{
        display:none;
    }
";
$this->registerCss($cssString);
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '报名队伍列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <form class="form-horizontal" action="index.php?r=team-apply-info/serch" method="get" style="margin-top: 30px;margin-bottom: 30px">
        <input type="hidden" name="r" value="team-apply-info/serch"/>
        <div class="col-xs-8" style="width:30%;"><input type="text" class="form-control" placeholder="请输入队伍编号" name="id_number"></div>
        <div class="text-left">
            <input type="hidden" name="event_id" value="<?php
            echo $_GET['event_id'];
            ?>"/>
            <button type="submit" class="btn btn-success" style="background-color: #2E8B57 ">搜索</button>
        </div>
    </form>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'apply_team_id',
            'event_name',
//            [
//                'label'=>'团队名',
//                'format'=>'raw',
//                'value' => function($model){
//                    $name=$model->name;
//                    return $name;
//                }
//            ],

            [
                'label'=>'签到',
                'format'=>'raw',
                'value' => function($model){
                    $id_affirm=$model->id_affirm;
                    $qiandao='';
                    if($id_affirm==0){
                        $qiandao='未签到';
                    }if($id_affirm==1){
                        $qiandao='已签到';
                    }

                    return $qiandao;
                }
            ],
            [
                'label'=>'签到',
                'format'=>'raw',
                'value' => function($model){
                    $id=$model->apply_team_id;
                    $url = "index.php?r=team-apply-info/qiandao&id=".$id."&event_id=".$_GET['event_id'];
            ;
                    return Html::a('点击签到', $url);
                }
            ],
            'position',
            [
                'label'=>'设置名次',
                'format'=>'raw',
                'value' => function($model){
                    $id=$model->user_id;
                    $url = "index.php?r=apply-info/banjiang&id=".$id."&event_id=".$_GET['event_id']."&banjiang=";
                    ;
                    return Html::a('设置', $url);
                }
            ],

        ],
    ]); ?>


</div>
<script>
    var de_thead=document.getElementsByTagName("thead");
    var de_th=de_thead[0].getElementsByTagName("th");
    de_th[0].innerHTML="序号";
</script>