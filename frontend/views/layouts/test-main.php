<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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
<!--    --><?php //$this->beginBody() ?>
<!--    <div class="wrap">-->
<!--        --><?php
//            NavBar::begin([
//                'brandLabel' => '比一比',
//                'brandUrl' => Yii::$app->homeUrl,
//                'options' => [
//                    'class' => 'navbar-inverse navbar-fixed-top',
//                ],
//            ]);
//            $menuItems = [
//                ['label' => '主页', 'url' => ['/site/index']],
//                ['label' => '关于我们', 'url' => ['/site/about']],
//                ['label' => '反馈信息', 'url' => ['/site/contact']],
//                ['label' => '用户中心', 'url' => ['/site/user']]
//            ];
//            if (Yii::$app->user->isGuest) {
//                $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
//                $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
//            } else {
//                $menuItems[] = [
//                    'label' => '退出 (' . Yii::$app->user->identity->username . ')',
//                    'url' => ['/site/logout'],
//                    'linkOptions' => ['data-method' => 'post'],
//                ];
//            }
//            echo Nav::widget([
//                'options' => ['class' => 'navbar-nav navbar-right'],
//                'items' => $menuItems,
//            ]);
//            NavBar::end();
//        ?>

        <div class="container" style="margin-left: -15px; margin-top: -20px; height: 100%">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

<!--    <footer class="footer">-->
<!--        <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--        </div>-->
<!--    </footer>-->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
