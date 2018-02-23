<?php

namespace frontend\controllers;
require dirname(dirname(__FILE__)).'/excel/PHPExcel.php';
use Yii;
use frontend\models\TeamApplyInfo;
use yii\data\ActiveDataProvider;
use frontend\frontbase\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApplyInfoController implements the CRUD actions for ApplyInfo model.
 */
class TeamApplyInfoController extends BaseController
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
        $apply=new TeamApplyInfo();
        $model=TeamApplyInfo::find()->where(['event_id'=>$eventid]);
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
        $sql = "update bm_team_apply_info SET id_affirm='1' WHERE apply_team_id='$id' AND event_id='$event_id' ";
        $command = $connection->createCommand($sql);
        $result = $command->execute();

        $apply=new TeamApplyInfo();
        $model=TeamApplyInfo::find()->where(['event_id'=>$event_id]);
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
        $apply=new TeamApplyInfo();
        $model=TeamApplyInfo::find()->where(['like','apply_team_id',$id_number])->andWhere(['event_id'=>$event_id]);
        $dataProvider = new ActiveDataProvider([
            //'query' => ApplyInfo::find($event_id,$user_id),
            'query'=>$apply->find()->where(['like','apply_team_id',$id_number])->andWhere(['event_id'=>$event_id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }
    /**
     * 报表下载
     * @return mixed
     */
    public function actionDownload()
    {
        $phpexcel = new \PHPExcel();


        //设置比标题
        $phpexcel->getActiveSheet()->setTitle('赛事报表下载');
//设置表头
        $phpexcel->getActiveSheet() ->setCellValue('A1','团队编号')
           // ->setCellValue('B1','团队名')
           ;

//从数据库取得需要导出的数据
        $eventid=Yii::$app->request->get()['event_id'];

        //$id=Yii::$app->user->getId();
        $model = TeamApplyInfo::find()->where(['event_id'=>$eventid])->all();
//用foreach从第二行开始写数据，因为第一行是表头
        $i=2;
        foreach($model as $val){
            $phpexcel->getActiveSheet() ->setCellValue('A'.$i,$val['apply_team_id'])
              //  ->setCellValue('B'.$i, $val['name'])
            ;
            $i++;
        }

        $obj_Writer = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
        $filename ='报表'. date('Y-m-d').".xls";//文件名

//设置header
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition:inline;filename="'.$filename.'"');
        header("Content-Transfer-Encoding: binary");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $obj_Writer->save('php://output');//输出
        die();//种植执行
    }
    /*
     * 小智
     */
    public function actionBanjiang(){
        $user_id=$_GET['id'];
        $event_id = $_GET['event_id'];
        return $this->render('banjiang',
            ['user_id'=>$user_id,'event_id'=>$event_id]
        );
    }
    public function actionHuojiang(){
        $user_id=$_GET['user_id'];
        $event_id = $_GET['event_id'];
        $position = $_GET['position'];
        $connection = Yii::$app->db;
        $username = "update bm_team_apply_info set position=$position WHERE user_id=$user_id AND event_id=$event_id";
        $usernamec = $connection->createCommand($username);
        $usernamer = $usernamec->execute();
        return $this->render('huojiang');
    }
}
