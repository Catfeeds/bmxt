<?php
namespace frontend\controllers;

use app\models\FriendsLink;
use frontend\models\News;
use frontend\models\ReleseEvent;
use frontend\models\ApplyInfo;
use frontend\models\ExtendsField;
use frontend\models\Shezhi;
use frontend\models\Shoucang;
use frontend\models\User;
use Yii;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use frontend\models\relese;
use yii\data\Pagination;
use frontend\models\Content;
use frontend\models\Info;
use geekdawns\unionpay\Unionpay;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model=new FriendsLink();
        $dataProvider = new ActiveDataProvider([
            'query'=>FriendsLink::find(),
        ]);

        $data = relese::find()->where(['addit'=>1]);
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '4']);
        $model1 = $data->offset($pages->offset)->limit($pages->limit)->orderBy('id desc')->all();
        $news=News::find()->orderBy('id desc')->all();

        return $this->render('index',[
            'model' => $model,
            'model1' => $model1,
            'pages' => $pages,
            'news'=>$news,
            'dataProvider' => $dataProvider
        ]);

    }

    public function actionLogin()
    {
        $this->layout='test-main';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $view = Yii::$app->view;
        $view->params['layoutData']='test';
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
        Yii::$app->user->logout(false);

        return $this->goHome();
    }
    public function actionPanduan()
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


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        //$users = User::find()->orderBy('username')->all();
       // var_dump($users);
        return $this->render('about');
    }

    public function actionRelese()
    {
        $this->redirect('index.php?r=relese/create');
    }
    public function actionYonghu()
    {

        $id=Yii::$app->user->getId();
        $connumber=ReleseEvent::find()->where(['user_id'=>$id])->count();
        $quanxian = user::findOne($id)->getQuanxian($id);
        $model=new ReleseEvent();
       // $num=Yii::$app->request->get()[$model->getNumber()];
        $dataProvider = new ActiveDataProvider([
            'query' => ReleseEvent::find()->andWhere(['user_id'=>$id]),
            'pagination'=>['pagesize'=>'5']
        ]);
        if($quanxian==1){
            return $this->render('yonghu', ['model'=>$model,
                'dataProvider' => $dataProvider,
                'connumber'=>$connumber,

            ]);
        }else{
            $connection = Yii::$app->db;
            $user_id = Yii::$app->user->id;
            $sql="SELECT * FROM (bm_shoucang INNER JOIN bm_user ON bm_shoucang.user_id=bm_user.id) INNER JOIN bm_relese_event ON bm_shoucang.event_id=bm_relese_event.id WHERE bm_user.id= $user_id";
            $data = $connection->createCommand($sql);
            $model1 = $data->queryAll();
            $tuijian=ReleseEvent::find()->where(['addit'=>1])->orderBy('id desc')->all();
            $sql2="SELECT * FROM (bm_apply_info INNER JOIN bm_user ON bm_apply_info.user_id=bm_user.id) INNER JOIN bm_relese_event ON bm_apply_info.event_id=bm_relese_event.id WHERE bm_user.id= $user_id";
            $data2 = $connection->createCommand($sql2);
            $model2 = $data2->queryAll();
            return $this->render('baomingyonghu',[
                'model1'=>$model1,
                'tuijian' => $tuijian,
                'model2' =>$model2,
            ]);

        }

    }

    public function actionXitong()
    {
        return $this->render('xitong');
    }

    public function actionBaoming()
    {
        $this->redirect('index.php?r=relese/index');
    }

    public function actionSignup()
    {
        $this->layout='test-main';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    Public function actionGettitle()
    {
        $id = 1;
        $model =new Shezhi();
        $title =$model::findOne($id)->title;
        var_dump($title);
        return $this->render('index',['title'=>$title]);
    }

    /**
     * 赛事内容
     * @return string
     */
    public function actionContent()
    {
        $model = new Content();
        $basic = new ApplyInfo();
        $user_id = Yii::$app->user->id;
        $model1 = Shoucang::find()->Where(['user_id'=>$user_id])->all();//先放一放


        if(Yii::$app->request->get('id') == ''){
            return $this->redirect('index.php');
        }else {
            $event_id = Yii::$app->request->get()['id'];
        }
        $field = $model->toHtml($event_id);
        $event_id = $model->getEventBasicItems($event_id);

        return $this->render('content',['basic_model' => $event_id, 'field' => $field,'basic' => $basic,'model1'=>$model1]);

    }
    /**
     * 按地点查看赛事
     * @return string
     */
    public function actionDidian()
    {
        $data = relese::find();
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '6']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('didian',[
            'model' => $model,
            'pages' => $pages,
        ]);

    }
    /**
     * 按类型查看赛事
     * @return string
     */
    public function actionType()
    {
        $data = relese::find();
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '6']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('type',[
            'model' => $model,
            'pages' => $pages,
        ]);

    }

    /**
     * 报名信息处理
     * @return
     */
    public function actionHandle(){
        $model = new Content();
        $handle = Yii::$app->request->post();

        $info = $model->handle($handle);

        if($info['msg'] == 0){
            $this->redirect("index.php?r=site/login");
        }else{
            //echo '<script>alert("'.$info['info'].'");</script>';
            //$this->redirect("index.php?r=site/content&id=$info[id]");
            $session = \Yii::$app->session;

            $session->open();
            $session->set('info',$info);
            //var_dump($session->get('info'));
            $this->redirect("index.php?r=site/payment");
        }

    }

    /**
     * 支付页面
     * @return
     */
    public function actionPayment(){
        $model = new Content();

        $info = \Yii::$app->session->get('info');

        return $this->render('payment',['model' => '1','info'=> $info,]);
        
    }

    /**
     * 支付完成响应界面
     * @return string
     */
    public function actionRespond(){
        $pos = \Yii::$app->request->post();

       return $this->render('respond',['pos' => $pos]);
    }
    /*
     * 收藏
     */
    public function actionShoucang(){

        return $this->render('shoucang');
    }
    /*
     * 取消收藏
     */
    public function actionQx(){
        return $this->render('qx');
    }
    /**
     * 查看免费赛事
     * @return string
     */
    public function actionPayfree()
    {
        $data = relese::find()->where(['apply_money'=>0]);
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '6']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('pay',[
            'model' => $model,
            'pages' => $pages,
        ]);

    }
    /**
     * 查看收费赛事
     * @return string
     */
    public function actionPayfor()
    {
        $data = relese::find()->where(['<>', 'apply_money', '0']);
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '6']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('pay',[
            'model' => $model,
            'pages' => $pages,
        ]);

    }
    /**
     * sousuo赛事
     * @return string
     */
    public function actionSerch()
    {

        $price=$_GET['price'];
        $organiz=$_GET['organiz'];
        $place=$_GET['place'];
        $type=$_GET['type'];
        $name=$_GET['name'];
        $time=$_GET['time'];
        $data =relese::find();
        if(!$organiz==0){
            $data->andWhere(['orgnize'=>$organiz]);
        }
        if(!$price==0){
            if($price==1){
                $data->andWhere(['apply_money'=>'0']);
            }else{
                $data->andWhere(['>','apply_money','0']);
            }

        }
        if(!$place==0){
            $data->andWhere(['place'=>$place]);
        }
        if(!$type==0){
            $data->andWhere(['event_type'=>$type]);
        }
        if(!$name==''){
            $data->andWhere(['like','event_name',$name]);
        }
        if(!$time==0){
            if($time==1){
                $data->andWhere(['is_end'=>'1']);
            }else{
                $data->andWhere(['is_end'=>'0']);
            }
        }
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '4']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('pay',[
            'model' => $model,
            'pages' => $pages,
        ]);

    }
}
