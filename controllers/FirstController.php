<?php

namespace app\controllers;

use app\models\Country;
use Yii;
use app\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FirstController extends Controller
{
    public function actionView($id)
    {
        $postModel = new Country();
        $model = $postModel->findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }
    
        return $this->render('view', ['model' => $model,]);
    }
    public function actionCreate()
    {
        $model = new Post;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }
}
