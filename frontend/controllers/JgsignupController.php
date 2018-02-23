<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Jgsignup;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * JgsignupController implements the CRUD actions for Jgsignup model.
 */
class JgsignupController extends BaseController
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
     * Lists all Jgsignup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Jgsignup::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jgsignup model.
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
     * Creates a new Jgsignup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jgsignup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isPost) {
                $model->img = UploadedFile::getInstance($model, 'img');

                if ($model->img && $model->validate()) {
                    $a = 'jg/' . $model->img->baseName . '.' . $model->img->extension;
                    $model->img->saveAs($a);
                    $b='jg/' . $model->img->baseName . '.' . $model->img->extension;
                    $connection = Yii::$app->db;
                    $sql = "update bm_jgsignup SET img='$b'WHERE id=$model->id";
                    $command = $connection->createCommand($sql);
                    $result = $command->execute();
                }
            }
            return $this->redirect(['ok']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionOk(){
        return $this->render('ok');
    }

    /**
     * Updates an existing Jgsignup model.
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
     * Deletes an existing Jgsignup model.
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
     * Finds the Jgsignup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jgsignup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jgsignup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
