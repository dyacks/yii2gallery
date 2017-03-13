<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\UploadedFile;
use backend\models\Image;


class ImageController extends Controller 
{
    
    public function actionAdd(){
        $model = new Image();
        return $this->render('create', ['model' => $model]);
    }

    public function actionSort(){
        return $this->render('sort');
    }

}