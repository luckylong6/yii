<?php

namespace app\controllers;

use app\models\Country;
use Yii;
use app\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{
    public function actionView($id)
    {
        $model = Country::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }
        var_dump($model);die;
        return $this->render('index', ['model' => $model]); 
    }
    public function actionCreate()
    {
        $model = new Country();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }
}
