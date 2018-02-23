<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItem;
use yii\data\ActiveDataProvider;
use backend\backbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends BaseController
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
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
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
            {
                    // 使用 AuthItem Model
                    $model = new AuthItem();
                    // 加载 authManager 组件
                    $auth = \Yii::$app->authManager;
                    // 校验 $_POST数据合法性
                    if ($model->load(Yii::$app->request->post())) {
                            // 从表单接收POST数据
                            $post = Yii::$app->request->post();
                            // 取出我们在前台录入的角色/权限字段里的内容
                            $name = $post['AuthItem']['name'];
                            // 取出描述
                            $description = $post['AuthItem']['description'];
                            // 取出类型 1角色 2权限
                            $type = $post['AuthItem']['type'];

                            if($type==1){
                                    // 调用 createRole函数，增加角色
                                    $createPost = $auth->createRole($name);
                            }elseif ($type==2){
                                    // 调用 createPermission函数，增加权限
                                    $createPost = $auth->createPermission($name);
                            }

                            // 填入对应的description
                            $createPost->description = $description;
                            // 调用 add函数，增加一个权限
                            $auth->add($createPost);

                            return $this->redirect([
                                    'view',
                                    'id' => $name
                            ]);
                    } else {
                            return $this->render('create', [
                                    'model' => $model
                            ]);
                    }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
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
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
