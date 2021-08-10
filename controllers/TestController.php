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

class TestController extends Controller
{
    protected $class_name;
    public function __construct($temp_name)
    {
        if($temp_name == 'Active') {
            $this->class_name = Active::getInstance();
        } elseif ($temp_name == 'SingleCase') {
            $this->class_name = SingleCase::getInstance();
        }
//        $this->class_name = $temp_name;
    }

    public function actionMain()
    {
//        $actvie = Active::getInstance();
//        $instance = "{$this->class_name}";
//        $intent = $this->class_name::getInstance();
        $this->class_name->test();
    }

}
