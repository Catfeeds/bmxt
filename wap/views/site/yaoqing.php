<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
$this->title = '寻找队友';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <form class="form-horizontal" action="index.php?r=site/about" method="get" style="margin-top: 30px;margin-bottom: 30px">
        <input type="hidden" name="r" value="site/serchname"/>
        <div class="col-xs-8" style="width:30%;"><input type="text" class="form-control" placeholder="请输入队友用户名" name="name"></div>
        <?php
        $tid=$_GET['tid'];
        $team_id=$_GET['team_id'];
        echo '<input type="hidden" name="tid" value='.$tid.'>';
        echo '<input type="hidden" name="team_id" value='.$team_id.'>'
        ?>
        <div class="text-left">
            <button type="submit" class="btn btn-success" style="background-color: #2E8B57 ">搜索</button>
        </div>
    </form>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            [
                'label'=>'邀请队友',
                'format'=>'raw',
                'value' => function($model){
                    $id=$model->id;
                    $tid=$_GET['tid'];
                    $team_id=$_GET['team_id'];
                    $url = "index.php?r=site/fasong&id=$id&tid=$tid&team_id=$team_id";

                    return Html::a('邀请', $url);
                }
            ],
        ],
    ]); ?>
</div>
