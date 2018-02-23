<?php

namespace frontend\controllers;

use Yii;
use frontend\models\relese;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReleseController implements the CRUD actions for relese model.
 */
class ReleseController extends BaseController
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
     * Lists all relese models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id=Yii::$app->user->id;
        $model=new relese();
        $dataProvider = new ActiveDataProvider([
            'query' => relese::find()->andWhere(['user_id'=>$id]),
            'pagination'=>['pagesize'=>'5']
        ]);

        return $this->render('index', ['model'=>$model,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all relese models.
     * @return mixed
     */
    public function actionBmindex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => relese::find(),
        ]);

        return $this->render('bmindex', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single relese model.
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
     * Creates a new relese model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new relese();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing relese model.
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
     * Deletes an existing relese model.
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
     * Finds the relese model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return relese the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = relese::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
