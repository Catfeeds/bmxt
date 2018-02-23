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
                $a = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;var_dump($a);
                $model->file->saveAs($a);

                $connection = Yii::$app->db;
                $sql = "insert into bm_img SET img='$a'";

                $command = $connection->createCommand($sql);
                $result = $command->execute();
                //print_r($result);

                return $this->render('ok');


            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionList()
    {
        return $this->render('list');
    }
}
