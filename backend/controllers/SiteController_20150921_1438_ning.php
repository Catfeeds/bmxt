<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login','index','error'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                       // 'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAdmin()
    {
        return $this->render('../admin/index');
    }
    public function actionQiantai()
    {
        $this->redirect('../../frontend/web/index.php');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionYonghu()
    {
        return $this->render('yonghu');
       // $id=Yii::$app->user->getId();
        // var_dump($id);
       // $quanxian = user::findOne($id)->getQuanxian($id);
        // var_dump($model1);
//        if($quanxian==1){
//            return $this->render('yonghu');
//        }else{
//            return $this->render('baomingyonghu');
//        }

    }
    public function actionXitong()
    {
        return $this->render('xitong');
    }
}
