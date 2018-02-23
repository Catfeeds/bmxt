<?php
namespace frontend\controllers;

use app\models\FriendsLink;
use frontend\models\Gsemployee;
use frontend\models\Gsteam;
use frontend\models\Jgsignup;
use frontend\models\News;
use frontend\models\ReleseEvent;
use frontend\models\ApplyInfo;
use frontend\models\ExtendsField;
use frontend\models\Shezhi;
use frontend\models\Shoucang;
use frontend\models\User;
use frontend\models\Team;
use frontend\models\users;
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
use frontend\models\Message;
use frontend\models\TeamApplyInfo;
use frontend\models\ReleseTeamEvent;
use frontend\models\TeamContent;
use backend\models\Leixing;
require dirname(dirname(__FILE__)).'/excel/PHPExcel.php';
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;
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

        $data1 = ReleseTeamEvent::find()->where(['addit'=>1]);
        $pages1 = new Pagination(['totalCount' =>$data1->count(), 'pageSize' => '4']);
        $model2 = $data1->offset($pages1->offset)->limit($pages1->limit)->orderBy('id desc')->all();

        return $this->render('index',[
            'model' => $model,
            'model1' => $model1,
            'pages' => $pages,
            'news'=>$news,
            'pages1'=>$pages1,
            'model2'=>$model2,
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
    /**
     * 按姓名查找队友
     * @return string
     * pengge
     */
    public function actionSerchname()
    {

        $tid=$_GET['tid'];
        $name=$_GET['name'];
        $users=new Users();
        $model=Users::find()->where(['like','username',$name]);
        $dataProvider = new ActiveDataProvider([
            //'query' => ApplyInfo::find($event_id,$user_id),
            'query'=>$users->find()->where(['like','username',$name])
        ]);

        return $this->render('yaoqing', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
            'tid'=>$tid
        ]);

    }
    /**
     * 查看队友
     * @return string
     * pengge
     */
    public function actionDuiyou()
    {
        $id=$_GET['id'];
        $users=new users();
        $member=Team::find()->where(['team_id'=>$id])->all();
        $arrr = array();
        foreach($member as $k){
            $arrr[]= $k->member_id;
        }
        // $user_id=$member['member_id'];
        $model=users::find()->where(['in','id',$arrr]);
        $dataProvider = new ActiveDataProvider([
            'query'=>$users->find()->where(['in','id',$arrr])
        ]);

        return $this->render('duiyou', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }
    /**
     * 邀请队友
     * @return string
     * pengge
     */
    public function actionYaoqing()
    {
        $name=$_GET['name'];
        $users=new users();
        $member=Team::find()->where(['name'=>$name])->all();
        $arrr = array();
        foreach($member as $k){
            $arrr[]= $k->member_id;
        }
        // $user_id=$member['member_id'];
        $model=users::find()->where(['in','id',$arrr]);
        $dataProvider = new ActiveDataProvider([
            'query'=>$users->find()->where(['in','id',$arrr])
        ]);

        return $this->render('yaoqing', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }
    /**
     * 发送邀请
     * @return string
     * pengge
     */
    public function actionFasong()
    {

        $id=Yii::$app->user->id;
        $bid=$_GET['id'];
        $tid=$_GET['tid'];
        $time=Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $message=Message::find()->where(['inviter'=>$id])->andWhere(['tid'=>$tid])->andWhere(['beinviter'=>$bid])->one();

        if($message){
            Yii::$app->getSession()->setFlash('success', '该用户已经邀请过，请耐心等待对方接受邀请！');


        }else{
            $connection = Yii::$app->db;
            $sql="INSERT INTO bm_message (inviter,tid,beinviter,send_time) VALUES ('$id', '$tid', '$bid', '$time')";
            $command = $connection->createCommand($sql);
            $result = $command->execute();
            Yii::$app->getSession()->setFlash('success', '消息发送成功');
        }


        $name='';
        $users=new users();
        $member=Team::find()->where(['name'=>$name])->all();
        $arrr = array();
        foreach($member as $k){
            $arrr[]= $k->member_id;
        }
        // $user_id=$member['member_id'];
        $model=users::find()->where(['in','id',$arrr]);
        $dataProvider = new ActiveDataProvider([
            'query'=>$users->find()->where(['in','id',$arrr])
        ]);

        return $this->render('yaoqing', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }
    /**
     * 解散团队
     * @return string
     * pengge
     */
    public function actionJiesan()
    {
        $id = $_GET['id'];
        $connection = Yii::$app->db;
        $sql = "DELETE FROM bm_team WHERE team_id = '$id'";
        $command = $connection->createCommand($sql);
        $result = $command->execute();
        Yii::$app->getSession()->setFlash('success', '队伍已成功解散');
        $this->redirect('index.php?r=site/yonghu');
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
        $model=ReleseEvent::find()->Where(['user_id'=>$id])->all();
        // $num=Yii::$app->request->get()[$model->getNumber()];
        $dataProvider = new ActiveDataProvider([
            'query' => ReleseEvent::find()->Where(['user_id'=>$id]),
            'pagination'=>['pagesize'=>'5']
        ]);
        $user_id = Yii::$app->user->id;
        $img = Jgsignup::find()->where(['user_id'=>$user_id])->all();
        if($quanxian==1){
            $model1=ReleseTeamEvent::find()->Where(['user_id'=>$id])->all();
            $dataProvider1=new ActiveDataProvider([
                 'query'=>ReleseTeamEvent::find()->where(['user_id'=>$id]),
                'pagination'=>['pagesize'=>'5']
            ]);
            return $this->render('yonghu', ['model'=>$model,
                'dataProvider' => $dataProvider,
                'dataProvider1' => $dataProvider1,
                'connumber'=>$connumber,
                'img'=>$img,
                'model1'=>$model1,

            ]);
        }elseif($quanxian==0){
            $connection = Yii::$app->db;
            $user_id = Yii::$app->user->id;
            $sql="SELECT distinct a.user_id,a.event_id,b.* FROM bm_shoucang a,bm_relese_event b WHERE a.event_id=b.id AND a.user_id=$user_id ";
            $data = $connection->createCommand($sql);
            $model1 = $data->queryAll();
            $tuijian=ReleseEvent::find()->where(['addit'=>1])->orderBy('id desc')->all();
            $sql2="SELECT * FROM bm_apply_info a,bm_relese_event b WHERE a.event_id=b.id AND a.user_id=$user_id";
            $data2 = $connection->createCommand($sql2);
            $model2 = $data2->queryAll();
            $sql3 = "SELECT * FROM bm_apply_info a,bm_relese_event b WHERE a.event_id=b.id AND a.user_id=$user_id AND position != 0";
            $data3 = $connection->createCommand($sql3);
            $model3 = $data3->queryAll();
            $dataProvider = new ActiveDataProvider([
                'query' => Team::find()->where(['member_id'=>$user_id]),
            ]);
            //获取消息
            $messageProvider = new ActiveDataProvider([
                'query' => Message::find()->where(['beinviter' => $user_id,]),
            ]);
            return $this->render('baomingyonghu',[
                'model1'=>$model1,
                'tuijian' => $tuijian,
                'model2' =>$model2,
                'model3' =>$model3,
                'dataProvider' => $dataProvider,
                'messageProvider' => $messageProvider,
            ]);

        }else{
            $tuijian=ReleseEvent::find()->where(['addit'=>1])->orderBy('id desc')->all();
            $xinxi = Gsemployee::find()->where(['gs_id'=>$user_id])->all();
            $connection = Yii::$app->db;
            $gs_id = Yii::$app->user->id;
            $sql="SELECT * from bm_gsteam WHERE gs_id=$gs_id";
            $data = $connection->createCommand($sql);
            $model = $data->queryAll();
            return $this->render('gsyonghu',
                ['tuijian'=>$tuijian,
                    'xinxi'=>$xinxi,
                    'model'=>$model,
                ]

            );
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
        $model1 = Shoucang::find()->Where(['user_id'=>$user_id])->all();


        if(Yii::$app->request->get('id') == ''){
            return $this->redirect('index.php');
        }else {
            $event_id = Yii::$app->request->get()['id'];
        }
        $connection = Yii::$app->db;
        $sql="SELECT * FROM bm_apply_info a,bm_user b WHERE a.user_id=b.id AND a.event_id=$event_id AND a.id_affirm='1'";
        $data = $connection->createCommand($sql);
        $orders = $data->queryAll();

        $field = $model->toHtml($event_id);
        $event_id = $model->getEventBasicItems($event_id);

        return $this->render('content',['basic_model' => $event_id, 'field' => $field,'basic' => $basic,'model1'=>$model1,'orders'=>$orders]);

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
        $event_id=$handle['Info']['bm_project'];

        //人数判断
        $renshu=ReleseEvent::find()->where(['id'=>$event_id])->one();
        $people=$renshu->people;
        $bm=$renshu->number;

        //时间判断
        $time = ReleseEvent::find()->where(['id' => $event_id])->one();
        $apply_time_end = $time->apply_time_end;
        $format_time_end = strtotime(substr($apply_time_end,0,4).'-'.substr($apply_time_end,7,2).'-'.substr($apply_time_end,12,2));
        $apply_time_now = time();
        if($bm<=$people){
            if($apply_time_now <= $format_time_end){
                $info = $model->handle($handle);
                if($info['msg'] == 0){
                    $this->redirect("index.php?r=site/login");
                }else{

                    $session = \Yii::$app->session;

                    $session->open();
                    $session->set('info',$info);
                    $this->redirect("index.php?r=site/payment");
                }
            }else{
                $this->redirect("index.php?r=site/timeout");
            }
        }else{
            $this->redirect("index.php?r=site/manyuan");
        }



    }

    /**
     * @param
     * @author Ning
     * @ 异步返回用户信息
     */
    public function actionUserInfo(){
        $model = new Content();
        $id = \Yii::$app->request->post()['user_id'];

        $model->getUserInfo($id);
        //判断是否登录

    }

    /**
     * 支付页面
     * @return
     */
    public function actionPayment(){
        $model = new Content();
        $info = \Yii::$app->session->get('info');
        $apply_id=$info['apply_id'];
        $paid = ApplyInfo::find()->andWhere(['id'=>$apply_id])->all();


        return $this->render('payment',['model' => '1','info'=> $info,'paid'=>$paid]);

    }

    /**
     * 支付完成响应界面
     * @return string
     */
    public function actionRespond(){
        $this->enableCsrfValidation;
        $pos = \Yii::$app->request->post();

        if(count($pos) == 0){
            $this->redirect('index.php?r=site/index');
        }else{
            if(isset($pos['respMsg'])){
                $array = explode('-',$pos['reqReserved']);
                $id = $array[0];

                ApplyInfo::updateAll(['is_paid' => 1],['id' => $id,]);

            }
            //return $this->render('respond',['pos' => $pos]);
        }
       //return $this->render('respond',['pos' => $pos]);
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
        $data =relese::find()->andWhere(['addit'=>'1']);
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
        $model = $data->offset($pages->offset)->limit($pages->limit)->orderBy('id desc')->all();
        return $this->render('pay',[
            'model' => $model,
            'pages' => $pages,
        ]);

    }
    /*
     * 小智 发布者信息
     */
    public function actionFabu(){
        $connection = Yii::$app->db;
        $event_id = $_GET['event_id'];
        $sql = "SELECT a.* FROM bm_jgsignup a,bm_relese_event b WHERE a.user_id=b.user_id AND b.id=$event_id";
        $command = $connection->createCommand($sql);
        $model = $command->queryAll();
        return $this->render('fabu',['model'=>$model]);
    }
    public function actionBaobiao()
    {

        $id=Yii::$app->user->getId();
        $connumber=ReleseEvent::find()->where(['user_id'=>$id])->count();
        $quanxian = user::findOne($id)->getQuanxian($id);
        $model=ReleseEvent::find()->Where(['user_id'=>$id])->all();
        // $num=Yii::$app->request->get()[$model->getNumber()];
        $dataProvider = new ActiveDataProvider([
            'query' => ReleseEvent::find()->Where(['user_id'=>$id]),
            'pagination'=>['pagesize'=>'5']
        ]);

        if($quanxian==1){
            return $this->render('baobiao', ['model'=>$model,
                'dataProvider' => $dataProvider,
                'connumber'=>$connumber,

            ]);
        }else{
            $connection = Yii::$app->db;
            $user_id = Yii::$app->user->id;
            $sql="SELECT distinct a.user_id,a.event_id,b.* FROM bm_shoucang a,bm_relese_event b WHERE a.event_id=b.id AND a.user_id=$user_id ";
            $data = $connection->createCommand($sql);
            $model1 = $data->queryAll();
            $tuijian=ReleseEvent::find()->where(['addit'=>1])->orderBy('id desc')->all();
            $sql2="SELECT * FROM bm_apply_info a,bm_relese_event b WHERE a.event_id=b.id AND a.user_id=$user_id";
            $data2 = $connection->createCommand($sql2);
            $model2 = $data2->queryAll();

            return $this->render('baomingyonghu',[
                'model1'=>$model1,
                'tuijian' => $tuijian,
                'model2' =>$model2,
            ]);

        }

    }

    /**
     * @return string
     * 报名人员限制
     */
    public function actionManyuan()
    {
        return $this->render('manyuan');
    }

    /**
     * @return string
     * 报名已结束
     */
    public function actionTimeout(){
        return $this->render('timeout');
    }
    /*
     * 建队 小智
     */
    public function actionJiandui(){
        if($_POST)
        {
            $value = $_POST['checkbox'];
            $model = Gsteam::find()->all();
            return $this->render('jiandui',['value'=>$value,'model'=>$model]);

        }else{
            echo "<script>alert('请先选择队员');location.href='index.php?r=site/yonghu'</script>";
        }



    }
    public function actionJianle(){
        if($_POST)
        {
            $gsname = $_POST['gsname'];
            $gsteam = $_POST['gsteam'];
            $team_id = $_POST['teamid'];
        }
        $connection = Yii::$app->db;
        $gs_id = Yii::$app->user->id;
        $sql="insert into bm_gsteam SET gs_id='$gs_id',gsname='$gsname',gsteam='$gsteam',team_id='$team_id'";
        $data = $connection->createCommand($sql);
        $model = $data->execute();

        return $this->redirect('index.php?r=site/yonghu');
    }
    public function actionDelete(){
        $id = $_GET['id'];
        if($id){
            $connection = Yii::$app->db;
            $sql="delete from bm_gsteam WHERE id='$id'";
            $data = $connection->createCommand($sql);
            $model = $data->execute();
            echo "<script>alert('删除成功');location.href='index.php?r=site/yonghu'</script>";
        }
    }

    /**
     *回复邀请
     *return max
     *@author ning
     */
    public function actionAcceptInvite(){
        $model = new Message;
        $team = new Team;
        $get = Yii::$app->request->get();
        $message = $model->find()->where(['inviter' =>$get['inviter'],'tid' => $get['tid'],'beinviter' => $get['beinviter']])->one();
        $message -> status ='1';
        $message ->reply ='1';
        $message->save();
        $team->name = $team::getTeamname($get['tid']);
        $team->builder_id =$get['inviter'];
        $team->member_id = $get['beinviter'];
        $team->save();
        Yii::$app->getSession()->setFlash('success','已成功接受邀请！');

        $this->redirect(['site/yonghu']);
    }
    /*
     * 公司表下载
     */
    public function actionDownload()
    {
        $phpexcel = new \PHPExcel();


        //设置比标题
        $phpexcel->getActiveSheet()->setTitle('公司员工表格式');
//设置表头
        $phpexcel->getActiveSheet() ->setCellValue('A1','姓名')
            ->setCellValue('B1','手机号')
            ->setCellValue('C1','性别')
            ->setCellValue('D1','身份证号');

//从数据库取得需要导出的数据
        $gs_id=Yii::$app->user->id;

        //$id=Yii::$app->user->getId();
        $model = Gsemployee::find()->all();
//用foreach从第二行开始写数据，因为第一行是表头
        $i=2;
        foreach($model as $val){
            $phpexcel->getActiveSheet() ->setCellValue('A'.$i)
                ->setCellValue('B'.$i)
                ->setCellValue('C'.$i)
                ->setCellValue('D'.$i)
            ;
            $i++;
        }

        $obj_Writer = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
        $filename ='员工格式表'. date('Y-m-d').".xls";//文件名

//设置header
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition:inline;filename="'.$filename.'"');
        header("Content-Transfer-Encoding: binary");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $obj_Writer->save('php://output');//输出
        die();//种植执行
    }

        /**
     * 赛事内容
     * @return string
     */
    public function actionTeamContent()
    {
        $model = new TeamContent();
        $basic = new TeamApplyInfo();
        $user_id = Yii::$app->user->id;
        $model1 = Shoucang::find()->Where(['user_id'=>$user_id])->all();


        if(Yii::$app->request->get('id') == ''){
            return $this->redirect('index.php');
        }else {
            $event_id = Yii::$app->request->get()['id'];
        }
        $connection = Yii::$app->db;
        $sql="SELECT * FROM bm_team_apply_info a,bm_user b WHERE a.user_id=b.id AND a.event_id=$event_id AND a.id_affirm='1'";
        $data = $connection->createCommand($sql);
        $orders = $data->queryAll();

        //$field = $model->toHtml($event_id);
        //类型
        $team = Leixing::find()->Where(['team_event_id' => $event_id])->all();

        $basic_model = $model->getEventBasicItems($event_id);
        return $this->render('team-content',['basic_model' => $basic_model,'basic' => $basic,'model1'=>$model1,'orders'=>$orders,'team' => $team]);

    }

    /**
     * 团队赛事报名处理
     * @author ning
     */
    function actionTeamHandle(){
        $model = new TeamContent();
        $handle = Yii::$app->request->post();
        $event_id=$handle['TeamApplyInfo']['bm_project'];

        //人数判断
        $renshu=ReleseTeamEvent::find()->where(['id'=>$event_id])->one();
        $people=$renshu->people;
        $bm=$renshu->number;

        //时间判断
        $time = ReleseTeamEvent::find()->where(['id' => $event_id])->one();
        $apply_time_end = $time->apply_time_end;
        $format_time_end = strtotime(substr($apply_time_end,0,4).'-'.substr($apply_time_end,7,2).'-'.substr($apply_time_end,12,2));
        $apply_time_now = time();
        if($bm<=$people){
            if($apply_time_now <= $format_time_end){
                $info = $model->handle($handle);
                if($info['msg'] == 0){
                    $this->redirect("index.php?r=site/login");
                }else{

                    $session = \Yii::$app->session;

                    $session->open();
                    $session->set('info',$info);
                    $this->redirect("index.php?r=site/payment");
                }
            }else{
                $this->redirect("index.php?r=site/timeout");
            }
        }else{
            $this->redirect("index.php?r=site/manyuan");
        }

    }

}
