<?php
namespace backend\controllers;
use yii;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;




class UploadController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $a = '../../frontend/web/banner/' . $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($a);
                $b='banner/' . $model->file->baseName . '.' . $model->file->extension;
                $connection = Yii::$app->db;
                $sql = "insert into bm_lunbo_img SET img='$b'";

                $command = $connection->createCommand($sql);
                $result = $command->execute();
                //print_r($result);
            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionList()
    {
        return $this->render('list');
    }
}
