<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\user\forms\frontend;

use app\modules\user\models\User;
use yii\base\Model;
use Yii;
use app\modules\user\Module;

/**
 * Description of SignupForm
 *
 * @author Isuhi
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyCode;
		
		private $_defaultRole;
 
    public function __construct($defaultRole, $config = [])
    {
        $this->_defaultRole = $defaultRole;
        parent::__construct($config);
    }
		
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '/^[a-zа-яё0-9_\-\s]+$/uis'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => Module::t('module', Module::t('module', 'ERROR_USERNAME_EXISTS'))],
            ['username', 'string', 'min' => 2, 'max' => 255],
 
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => Module::t('module', 'ERROR_EMAIL_EXISTS')],
 
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
 
            ['verifyCode', 'captcha', 'captchaAction' => '/user/default/captcha'],
        ];
    }
		
		public function attributeLabels()
    {
        return [
					'username' => Module::t('module', 'SIGNUP_USERNAME'),
					'email' => Module::t('module', 'SIGNUP_EMAIL'),
					'password' => Module::t('module', 'SIGNUP_PASSWORD'),
					'verifyCode' => Module::t('module', 'SIGNUP_VERIFY_CODE'),
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
//					if (!$user = User::findOne(['email' => $this->email, 'status' => USER::STATUS_WAIT])) {
//    $user = new User();

            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->status = User::STATUS_WAIT;
						$user->role = $this->_defaultRole;
            $user->generateAuthKey();
            $user->generateEmailConfirmToken();
 
            if ($user->save()) {
                 Yii::$app->mailer->compose('@app/modules/user/mails/emailConfirm', ['user' => $user])
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject('Подтверждение электронной почты для: ' . Yii::$app->name)
                    ->send();
                return $user;
            }
        }
 
        return null;
    }
}
