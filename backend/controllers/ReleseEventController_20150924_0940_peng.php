<?php

namespace backend\controllers;

use Yii;
use backend\models\ReleseEvent;
use backend\models\ReleseEventSearch;
use backend\backbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
                        'actions' => ['create','index','list','view','update','delete','un-addit','finish','totle','create-self','set-item'],
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();

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
                'model' => $model,'data' => $data,'temp' => $template,'eventType' => $eventType,'organize' => $organize,
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
        $get = Yii::$app->request->get();
        $id = $get['id'];


        $template = $model->getCreateSelf($id);
        $lenth = count($template);
        $fieldtype = $model->getFieldType();
        return $this->render('create-self', [
            'model' => $model,'temp'=>$template,'id' => $id,'fieldtype' => $fieldtype,'lenth'=>$lenth,
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
}
