<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\SingleCase;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class AgentsController extends Controller
{
    protected $db_name = 'user';
    protected $do_name = 'im_user_do';
    protected $class_name = "tb_im_user";

    public function actionTest()
    {
        $test = new TestController('Active');
        $test->actionMain();
        
    }
}
