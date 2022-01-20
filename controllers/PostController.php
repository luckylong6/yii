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
        var_dump("view".$id);die;
        $postModel = new Country();
        $model = $postModel->findAll([]);
        if ($model === null) {
            throw new NotFoundHttpException;
        }
    
        // return $this->render('view', ['model' => $model,]);
        return $this->renderPartial('index', ['model' => $model, 'name' => 'zhaoyalong', 'country' => 'china']);
    }
    public function actionCreate($id)
    {
        var_dump("create".$id);die;
        $model = new Post;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    public function actionRead($id)
    {
        var_dump("read".$id);
    }
}
