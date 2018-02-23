<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
        echo "<img style='margin-left: 0px' src='../images/logo.png'/>";
            $url = Yii::$app->request->hostInfo.'/frontend/web/index.php';
            $menuItems = [
                ['label' => '前往前台', 'url' =>$url],
                ['label' => '主页', 'url' => ['/site/index']],
                [
                    'label' => '赛事管理',
                    'url' => ['/relese-event/index'],
                    'items' => [
                        ['label' => '未审核', 'url' => ['/relese-event/un-addit']],
                        ['label' => '报名中', 'url' => ['/relese-event/list']],
                        ['label' => '已结束', 'url' => ['/relese-event/finish']],
                        ['label' => '赛事统计', 'url' => ['/relese-event/totle']]
                    ]
                ],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
