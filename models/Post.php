<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class Post extends ActiveRecord
{
    public static function tableName(){
        return '{{%post}}';
    }
}
