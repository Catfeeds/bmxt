<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\EchartsAsset;
use frontend\Hisune\EchartsPHP\ECharts;


/* @var $this yii\web\View */
$this->title = '报表统计';
$this->registerCssFile('css/fbuser_center.css');
$this->registerJsFile('js/jquery-1.11.3.min.js');
$this->registerJsFile('js/fbuser_center.js');

?>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

</div>
<div >
    <div>

        <?php
        $arrr = array();
        foreach($model as $k){
            $arrr[]= $k->event_name;
        }
        $arra = array();
        foreach($model as $k){
            $arra[]= $k->number;
        }
        $asset=EchartsAsset::register($this);
        $chart = new ECharts($asset->baseUrl);
        $chart->tooltip->show = true;
        $chart->legend->data = array('赛事报名人数表');
        $chart->xAxis = array(
            array(
                'type' => 'category',
                'data' => $arrr,


            )
        );
        $chart->yAxis = array(
            array('type' => 'value')
        );
        $chart->series = array(
            array(
                'name' => '报名人数',
                'type' => 'bar',
                'data' =>$arra,
            )
        );
        echo $chart->render('simple-custom-id4');
        ?>

    </div>
<div>
    <p>注：横轴为赛事名称，纵轴为报名人数</p>
</div>
    <div>
        <?php
        $arrr = array();
        foreach($model as $k){
            $arrr[]= $k->event_name;
        }
        $arra = array();
        foreach($model as $k){
           // $arra[]= $k->number;
            $arra[]= $k->apply_money*$k->number;
        }
        $asset=EchartsAsset::register($this);
        $chart = new ECharts($asset->baseUrl);
        $chart->tooltip->show = true;
        $chart->legend->data = array('赛事报名费用数表');
        $chart->xAxis = array(
            array(
                'type' => 'category',
                'data' => $arrr,


            )
        );
        $chart->yAxis = array(
            array('type' => 'value')
        );
        $chart->series = array(
            array(
                'name' => '报名费用',
                'type' => 'bar',
                'data' =>$arra,
            )
        );
        echo $chart->render('simple-custom-id1');
        ?>

    </div>
    <div>
        <p>注：横轴为赛事名称，纵轴为总收取报名费用</p>
    </div>
</div>



