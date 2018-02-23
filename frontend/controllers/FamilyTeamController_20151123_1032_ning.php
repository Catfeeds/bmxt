<?php

namespace frontend\controllers;

use Yii;
use frontend\models\FamilyTeam;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\FamilyInfo;

/**
 * FamilyTeamController implements the CRUD actions for FamilyTeam model.
 */
class FamilyTeamController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all FamilyTeam models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FamilyTeam::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FamilyTeam model.
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
     * Creates a new FamilyTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FamilyTeam();

        if ($model->load(Yii::$app->request->post())) {
            $string = '';
            $array = Yii::$app->request->post()['FamilyTeam']['family_team_content'];

        //name
        $user_id = Yii::$app->user->id;
        $rows = FamilyInfo::find()->asArray()->where(['user_id'=>$user_id])->all();


            foreach ($array as $key => $value) {
                    $string .= $rows[$value]['name'].'/';
            }



            $model->family_team_content = $string;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FamilyTeam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
                        $string = '';
            $array = Yii::$app->request->post()['FamilyTeam']['family_team_content'];

        //name
        $user_id = Yii::$app->user->id;
        $rows = FamilyInfo::find()->asArray()->where(['user_id'=>$user_id])->all();


            foreach ($array as $key => $value) {
                    $string .= $rows[$value]['name'].'/';
            }



            $model->family_team_content = $string;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FamilyTeam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['site/yonghu']);
    }

    /**
     * Finds the FamilyTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FamilyTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FamilyTeam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
