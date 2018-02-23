<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

$cssString="

    .navbar-inverse{
        background: #4599E3;
        border:none;
    }
    .dropdown-toggle{
        background: #4599E3;
        border:none;
    }
    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus{
        background: #4599E3;
        border-left:1px solid #ffffff;
        border-right:1px solid #ffffff;
    }

    .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus{
        background: #4599E3;
        font-weight:700;
        padding: 20px 10px;
        font-size:16px;
    }
    .navbar-inverse .navbar-nav > li > a, .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus{
        background: #4599E3;
        padding: 20px 10px;
        color:#dddddd;
    }
    .dropdown-menu{
        min-width:90px;
    }
    .dropdown-menu > li > a{
        padding:2px 10px;
    }
";
$this->registerCss($cssString);

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
    <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                //'brandLabel' => '比一比',
               // 'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
        echo "<img style='margin-left: 0px' src='/images/logo.png'/>";
            $url = Yii::$app->request->hostInfo.'/frontend/web/index.php';
            $menuItems = [
               // ['label' => '前往前台', 'url' =>$url],
                ['label' => '主页', 'url' => ['/site/index']],
                ['label' => '注册', 'url' => ['/site/signup']],




                //['label' => '赛事管理', 'url' => ['/relese-event/un-addit']],



               // ['label' => '模板管理', 'url' => ['/site/index']],

            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
               // $quanxian=$this->params['quanxian'];
                $model=\backend\models\UserAdmin::findOne(Yii::$app->user->id);
                $quanxian=$model['quanxian'];
                $xitong=$model['xitong'];
                $yonghu=$model['yonghu'];
                $caiwu=$model['caiwu'];
                $guanggao=$model['guanggao'];
                $tupian=$model['tupian'];
                $wenzhang=$model['wenzhang'];
                $saishi=$model['saishi'];
                if(!0==$quanxian){
                    $menuItems[] =['label' => '权限设置', 'url' => ['/user-admin/index']];
                    $menuItems[] =['label' => '赛事置顶', 'url' => ['/zd-relese-event/index']];
                }if(!0==$yonghu){
                    $menuItems[] =['label' => '用户管理', 'url' => ['/users'],'items' => [
                        ['label' => '总用户管理', 'url' => ['/users']],
                        ['label' => '机构用户管理', 'url' => ['/jgsignup/index']],


                    ]];
                }if(!0==$caiwu){
                    $menuItems[] =['label' => '财务管理', 'url' => ['/relese-event/check']];
                }if(!0==$guanggao){
                    $menuItems[] =['label' => '广告管理', 'url' => ['/lunboimg/index']];
                }if(!0==$wenzhang){
                    $menuItems[] =['label' => '文章管理', 'url' => ['/news/index']];
                }if(!0==$saishi){
                    $menuItems[] =[
                        'label' => '赛事管理',
                        'url' => ['/relese-event/index'],
                        'items' => [
                            ['label' => '未审核', 'url' => ['/relese-event/un-addit']],
                            ['label' => '报名中', 'url' => ['/relese-event/list']],
                            ['label' => '已结束', 'url' => ['/relese-event/finish']],
                        ]
                    ];
                }
                $menuItems[] = [
                    'label' => '退出 (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
               // $menuItems[] =['label'=>'用户中心','url'=>['/site/yonghu']];
            }
           // $menuItems[] =['label'=>'前往前台','url'=>['/site/qiantai']];
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
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">Copyright&nbsp;&copy;&nbsp;<?= date('Y') ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action">鲁ICP备15017665号</a></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
