<?php

namespace frontend\controllers;


use frontend\models\Content;
use Yii;
use frontend\models\ReleseEvent;
use frontend\models\ReleseEventSearch;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\web\getExtension;

/**
 * ReleseEventController implements the CRUD actions for ReleseEvent model.
 */
class ReleseEventController extends BaseController
{
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create','index','list','view','update','delete','un-addit','finish','totle','create-self','set-item','check','update-item'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],

            ],
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['http://www.51first.cn'],
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ]
            ]
        ];

    }

    /**
     * Lists all ReleseEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReleseEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReleseEvent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ReleseEvent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReleseEvent();
        $rootPath = "uploads/";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->attributes = $_POST['ReleseEvent'];
            $event_img = UploadedFile::getInstance($model, 'event_img');
            $ext = $event_img->getExtension();
            $randName = time() . rand(1000, 9999) . "." . $ext;
            $event_img->saveAs($rootPath . $randName);
            $model->event_img = $rootPath.$randName;
            $post = Yii::$app->request->post();
            /*
             * 判断图片格式
             */
            $str = $rootPath.$randName;
            $str1 = substr($str,-3);
                if($str1=='jpg'||$str1=='png'||$str1=='gif'){
                    $connection = Yii::$app->db;
                    $sql = "update bm_relese_event SET event_img='$rootPath$randName' WHERE id='$model->id'";
                    $command = $connection->createCommand($sql);
                    $result = $command->execute();
                    $arr = $_POST;
                    $wenzhang = $arr["ReleseEvent"]["wenzhang"];
                    $sql1 = "update bm_relese_event SET wenzhang='$wenzhang' WHERE id='$model->id'";
                    $command1 = $connection->createCommand($sql1);
                    $result1 = $command1->execute();
                    $jianjie = $arr['ReleseEvent']['jianjie'];
                    $sql2 = "update bm_relese_event SET jianjie='$jianjie' WHERE id='$model->id'";
                    $command2 = $connection->createCommand($sql2);
                    $result2 = $command2->execute();
                }else{
                    return $this->render('404');
                }
            /*
             * 结束
             */
            if($post['ReleseEvent']['is_extends']== 1){
                return $this->redirect(['create-self', 'id' => $model->id]);
            }else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
                $eventType = $model->getEventType();
                $organize = $model->getOrgnaizes();
                $data = $model->getEventType();
                $template = $model->getTemplate(1);
                return $this->render('create', [
                    'model' => $model, 'data' => $data, 'temp' => $template, 'eventType' => $eventType, 'organize' => $organize,
                ]);
            }
        }


    /**
     * Updates an existing ReleseEvent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $models = new ReleseEvent();
        $eventType = $models->getEventType();
        $organize = $models->getOrgnaizes();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,'eventType' => $eventType,'organize' => $organize,
            ]);
        }
    }

    /**
     * Deletes an existing ReleseEvent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReleseEvent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReleseEvent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReleseEvent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * 未审核赛事列表
     * @ return mixed
     */
    public function actionUnAddit(){
        $searchModel = new ReleseEventSearch();
        $dataProvider = $searchModel->unaddit(Yii::$app->request->queryParams);

        return $this->render('un-addit', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * 报名中赛事列表
     * @ return mixed
     */
    public function actionList(){
        $searchModel = new ReleseEventSearch();
        $dataProvider = $searchModel->addit(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 已结束赛事列表
     * @ return mixed
     */
    public function actionFinish(){
        $searchModel = new ReleseEventSearch();
        $dataProvider = $searchModel->finish(Yii::$app->request->queryParams);

        return $this->render('finish', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * 赛事统计列表
     * @ return mixed
     */
    public function actionTotle(){
        echo '2';
    }

    /**
     * Ajax 获取数据形成联动菜单
     */
    public function actionGetClick(){
        $model = new ReleseEvent();
        $post = Yii::$app->request->post();
        $data = $model->getTemplate($post['id']);
        echo $data;

    }

    /**
     * 添加自定义字段list页面
     */
    public function actionCreateSelf(){
        $model = new ReleseEvent();
        $content_model = new Content();
        $get = Yii::$app->request->get();
        $id = $get['id'];

        $template = $model->getSelfTemplate($id);
        $lenth = count($template);
        $fieldtype = $model->getFieldType();
        $field = $content_model->toHtml($id);
        return $this->render('create-self', [
            'model' => $model,'temp'=>$template,'id' => $id,'fieldtype' => $fieldtype,'lenth'=>$lenth,'field' => $field,
        ]);

    }

    /**
     * @ SetItem页面
     */
    public function actionSetItem(){
        $model = new ReleseEvent();

        $post = Yii::$app->request->post();

        echo($model->SetField($post));

    }

    /**
     * @ 修改自定义选项
     */
    public function actionUpdateItem(){
        $model = new ReleseEvent();

        $post = Yii::$app->request->post();

        echo($model->updateSelf($post));
    }


    /**
     * 赛事列表
     * @return mixed
     */
    public function actionCheck()
    {
        $model = new ReleseEvent();
        $dataProvider = new ActiveDataProvider([
            'query' => ReleseEvent::find(),
            'pagination'=>['pagesize'=>'10']
        ]);

        return $this->render('check', ['model'=>$model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
