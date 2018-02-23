<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ApplyInfo;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApplyInfoController implements the CRUD actions for ApplyInfo model.
 */
class ApplyInfoController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ApplyInfo models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ApplyInfo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex()
    {
        $eventid=Yii::$app->request->get()['event_id'];
        $apply=new ApplyInfo();
        $model=ApplyInfo::find()->where(['event_id'=>$eventid]);
        $dataProvider = new ActiveDataProvider([
            //'query' => ApplyInfo::find($event_id,$user_id),
            'query'=>$apply->find()->where(['event_id'=>$eventid])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }

    /**
     * Displays a single ApplyInfo model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ApplyInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ApplyInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ApplyInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ApplyInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApplyInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ApplyInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApplyInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionQiandao()
    {
        $id=$_GET['id'];
        $event_id=$_GET['event_id'];

        $connection = Yii::$app->db;
        $sql = "update bm_apply_info SET id_affirm='1' WHERE id='$id'";
        $command = $connection->createCommand($sql);
        $result = $command->execute();

        $apply=new ApplyInfo();
        $model=ApplyInfo::find()->where(['event_id'=>$event_id]);
        $dataProvider = new ActiveDataProvider([
            //'query' => ApplyInfo::find($event_id,$user_id),
            'query'=>$apply->find()->where(['event_id'=>$event_id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }
    public function actionSerch()
    {
        ;
        $id_number=$_GET['id_number'];
        $event_id=$_GET['event_id'];
        $apply=new ApplyInfo();
        $model=ApplyInfo::find()->where(['like','id_number',$id_number])->andWhere(['event_id'=>$event_id]);
        $dataProvider = new ActiveDataProvider([
            //'query' => ApplyInfo::find($event_id,$user_id),
            'query'=>$apply->find()->where(['like','id_number',$id_number])->andWhere(['event_id'=>$event_id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }
}
