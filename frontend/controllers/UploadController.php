<?php
namespace frontend\controllers;
use yii;
use frontend\models\UploadForm;
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
                $randName = time() . rand(1000, 9999);
                $a = '../../frontend/abcd/' . $randName . '.' . $model->file->extension;
                $model->file->saveAs($a);

                $connection = Yii::$app->db;
                $gs_id = Yii::$app->user->id;
                $sql = "insert into bm_img SET img='$a',gs_id='$gs_id'";

                $command = $connection->createCommand($sql);
                $result = $command->execute();
                //print_r($result);

                return $this->render('list');


            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionList()
    {
        return $this->render('list');
    }



}
