<?php
/**
 * 文件名 : FamilyInfoController.php
 * ============================================================================

 * 网站地址: http://www.yijianshen.net；
 * ============================================================================
 * $Author: Dawn.S $
 * $Id: FamilyInfoController.php  2015/11/13 $
*/
namespace frontend\controllers;

use Yii;
use frontend\models\FamilyInfo;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FamilyInfoController implements the CRUD actions for FamilyInfo model.
 */
class FamilyInfoController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post','get'],
                ],
            ],
        ];
    }


   /**
     * 鉴权
     */
    public function beforeAction($event){

            $controller = $event->controller->id; //获取到控制器
            $action = $event->id; //获取到action

             //验证权限
            $access = $controller."/".$action;  //权限name

             /* @var yii\rbac\DbManager $auth*/
             $auth = Yii::$app->authManager;

            if (!Yii::$app->user->can($access)) {
                    throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
            }

            return true;

    }




    /**
     * Lists all FamilyInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FamilyInfo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FamilyInfo model.
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
     * Creates a new FamilyInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FamilyInfo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FamilyInfo model.
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
     * Deletes an existing FamilyInfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('index.php?r=site/yonghu');
    }

    /**
     * Finds the FamilyInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FamilyInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FamilyInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
