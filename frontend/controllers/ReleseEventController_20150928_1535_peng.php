<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ReleseEvent;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ReleseEventController implements the CRUD actions for ReleseEvent model.
 */
class ReleseEventController extends BaseController
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
     * Lists all ReleseEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ReleseEvent::find(),
        ]);

        return $this->render('index', [
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
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $a = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
                var_dump($a);
                $model->file->saveAs($a);

                $connection = Yii::$app->db;
                $sql = "insert into bm_relese_event SET event_img='$a'";

                $command = $connection->createCommand($sql);
                $result = $command->execute();
                //print_r($result);

            }
            if ($post['ReleseEvent']['is_extends'] == 1) {
                return $this->redirect(['create-self', 'id' => $model->id]);
            } else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $data = $model->getEventType();
            $template = $model->getTemplate(1);
            return $this->render('create', [
                'model' => $model, 'data' => $data, 'temp' => $template,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
