<?php

namespace app\controllers;

use app\models\Active;
use app\models\EntryForm;
use app\models\SingleCase;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\CountrySearch;

class TestController extends Controller
{
    protected $class_name;

    /* 属性标签 */
    public function actionTest1()
    {
        var_dump(\Yii::$app->request->get());
        $model = new \app\models\ContactForm; // 用户输入数据赋值到模型属性
        $model->attributes = \Yii::$app->request->get();
        if ($model->validate()) { // 所有输入数据都有效 all inputs are valid 
            $errors = '';
        } else { // 验证失败：$errors 是一个包含错误信息的数组 
            $errors = $model->errors;
        }
        var_dump($errors);
    }
    /* 场景 */
    public function actionTest()
    {
        $model = new \app\models\ContactForm(['scenario' => 'login']);
        $model->attributes = \Yii::$app->request->get();
        if ($model->validate()) { // 所有输入数据都有效 all inputs are valid 
            $errors = '';
        } else { // 验证失败：$errors 是一个包含错误信息的数组 
            $errors = $model->errors;
        }
        var_dump($errors);
    }

    /* 块赋值 */
    public function actionAssignment()
    {
        $model = new \app\models\ContactForm;
        $data = \Yii::$app->request->get();
        $model->username = isset($data['username']) ? $data['username'] : null;
        $model->password = isset($data['password']) ? $data['password'] : null;
        var_dump($model->password);
    }
    
    /* 视图 */
    public function actionView_test()
    {
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
