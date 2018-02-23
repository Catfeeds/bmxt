<?php
namespace backend\controllers;

require dirname(dirname(__FILE__)).'/excel/PHPExcel.php';
use backend\models\ReleseEvent;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login','index','error'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                       // 'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAdmin()
    {
        return $this->render('../admin/index');
    }
    public function actionQiantai()
    {
        $this->redirect('../../frontend/web/index.php');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionYonghu()
    {
        return $this->render('yonghu');
       // $id=Yii::$app->user->getId();
        // var_dump($id);
       // $quanxian = user::findOne($id)->getQuanxian($id);
        // var_dump($model1);
//        if($quanxian==1){
//            return $this->render('yonghu');
//        }else{
//            return $this->render('baomingyonghu');
//        }

    }
    public function actionXitong()
    {
        return $this->render('xitong');
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
        $phpexcel->getActiveSheet() ->setCellValue('A1','赛事名')
            ->setCellValue('B1','审核')
            ->setCellValue('C1','赛事类型')
            ->setCellValue('D1','开始时间')
            ->setCellValue('E1','结束时间')
            ->setCellValue('F1','比赛地点')
            ->setCellValue('G1','赛事名')
            ->setCellValue('H1','报名费')
            ->setCellValue('I1','报名人数');

//从数据库取得需要导出的数据
        $model=ReleseEvent::find()->all();
        //$data = relese::find();
        // $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '8']);
        // $model = $data->offset($pages->offset)->limit($pages->limit)->all();
//用foreach从第二行开始写数据，因为第一行是表头
        $i=2;
        foreach($model as $val){
            $phpexcel->getActiveSheet() ->setCellValue('A'.$i,$val['event_name'])
                ->setCellValue('B'.$i, $val['addit'])
                ->setCellValue('C'.$i, $val['event_type'])
                ->setCellValue('D'.$i, $val['apply_time_start'])
                ->setCellValue('E'.$i, $val['apply_time_end'])
                ->setCellValue('F'.$i, $val['place'])
                ->setCellValue('G'.$i, $val['contact_name'])
                ->setCellValue('H'.$i, $val['apply_money'])
                ->setCellValue('I'.$i, $val['number'])
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
}
