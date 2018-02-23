<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ReleseTeamEvent;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ReleseTeamEventController implements the CRUD actions for ReleseTeamEvent model.
 */
class ReleseTeamEventController extends BaseController
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
     * Lists all ReleseTeamEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ReleseTeamEvent::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReleseTeamEvent model.
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
     * Creates a new ReleseTeamEvent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReleseTeamEvent();
        $rootPath = "uploads/";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->attributes = $_POST['ReleseTeamEvent'];
            $event_img = UploadedFile::getInstance($model, 'event_img');
            if($event_img!==null) {
                $ext = $event_img->getExtension();

                $randName = time() . rand(1000, 9999) . "." . $ext;
                $event_img->saveAs($rootPath . $randName);
                $model->event_img = $rootPath . $randName;
                $post = Yii::$app->request->post();
            }else{
                return $this->render('405');
            }
            /*
             * 判断图片格式
             */
            $str = $rootPath.$randName;
            $str1 = substr($str,-3);
                if($str1=='jpg'||$str1=='png'||$str1=='gif'){
                    $connection = Yii::$app->db;
                    $sql = "update bm_relese_team_event SET event_img='$rootPath$randName' WHERE id='$model->id'";
                    $command = $connection->createCommand($sql);
                    $result = $command->execute();
                    $arr = $_POST;
                    $wenzhang = $arr["ReleseTeamEvent"]["wenzhang"];
                    $sql1 = "update bm_relese_team_event SET wenzhang='$wenzhang' WHERE id='$model->id'";
                    $command1 = $connection->createCommand($sql1);
                    $result1 = $command1->execute();
                    $jianjie = $arr['ReleseTeamEvent']['jianjie'];
                    $sql2 = "update bm_relese_team_event SET jianjie='$jianjie' WHERE id='$model->id'";
                    $command2 = $connection->createCommand($sql2);
                    $result2 = $command2->execute();
                }else{
                    return $this->render('404');
                }
            /*
             * 结束
             */

                return $this->redirect(['view', 'id' => $model->id]);

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
     * Updates an existing ReleseTeamEvent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $models = new ReleseTeamEvent();
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
     * Deletes an existing ReleseTeamEvent model.
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
     * Finds the ReleseTeamEvent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReleseTeamEvent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReleseTeamEvent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
