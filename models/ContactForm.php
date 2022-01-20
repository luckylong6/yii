<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [ // 在"register" 场景下 username, email 和 password 必须有值 
            [
                ['username', 'email', 'password'],
                'required',
                'on' => 'register'
            ], // 在 "login" 场景下 username 和 password 必须有值 
            [
                ['username', 'password'],
                'required',
                'on' => 'login'
            ],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => \Yii::t('app', 'Your name'),
            'email' => \Yii::t('app', 'Your email address'),
            'subject' => \Yii::t('app', 'Subject'),
            'body' => \Yii::t('app', 'Content'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

    public function scenarios()
    {
        return [
            'login' => ['username', 'password'],
            'register' => ['username', 'email', 'password'],
        ];
    }
}
