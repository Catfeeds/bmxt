<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

$cssString="
    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus{
        background:#379BE9;
        border-left:1px solid #ffffff;
        border-right:1px solid #ffffff;
    }
    .dropdown-menu , .dropdown-menu > li  {
        min-width:88px;
        text-align:center;
    }
    .dropdown-menu > li > a{

    }
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus{
        background:#eeeeee;
    }
    #w4 > li > a{
        width:105px;
    }
";
$this->registerCss($cssString);

$jsString="";
$this->registerJs($jsString);

$this->registerJsFile('js/topnav.js');

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/frontend/images/favicon.ico">
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap" >
        <?php
            NavBar::begin([

                //$this->
               // 'brandLabel' => '比一比',
               // 'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo "<img style='margin-left: -100px' src='../images/logo.png'/>";
            $menuItems = [
                ['label' => '首页', 'url' => ['/site/index']],

            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => '用户登录', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => '退出 (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
                $menuItems[] =['label'=>'用户中心','url'=>['/site/yonghu']];

            }

            // $menuItems[] =['label'=>'Price','url'=>['/site/piaojia']];
            // $menuItems[] =['label'=>'Users','url'=>['/site/users']];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>

            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p style="text-align: center;">友情链接：
                <a href="http://www.xzjwh.com/">济南新知觉文化传播有限公司</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://www.yijianshen.net/">易健绅体育健身服务平台</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://jn.yijianshen.net/">国华东方美郡游泳馆</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://www.facetoworld.net/">济南邮政-横扫全城</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://www.jnsports.cn/">济南全民健身网</a>&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
        <p style="text-align: center;">Copyright&nbsp;&copy;&nbsp;<?= date('Y') ?>&nbsp;&nbsp;&nbsp;&nbsp;鲁ICP备15017665号&nbsp;&nbsp;&nbsp;&nbsp;<?= Yii::powered() ?>&nbsp;&nbsp;&nbsp;&nbsp;客服电话：4008518308</p>
        <p class="pull-right"></p>
<!--            --><?php
//            echo $this->params['title'];
//            ?>
        <p>

        </p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
