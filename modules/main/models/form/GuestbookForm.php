<?php
namespace app\modules\main\models\form;

use Yii;
use yii\base\Model;
use app\modules\main\Module;
use app\modules\user\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\modules\main\models\backend\Guestbook;
use yii\helpers\HtmlPurifier;

class GuestbookForm extends Model
{
    public $username;
    public $email;
    public $url;
    public $text;
    public $verifyCode;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '/^[a-zа-яё0-9_\-\s]+$/uis'],
//            ['username', 'unique', 'targetClass' => User::className(), 'message' => Module::t('module', 'ERROR_USERNAME_EXISTS')],
            ['username', 'string', 'min' => 4, 'max' => 255],
 
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
//            ['email', 'unique', 'targetClass' => User::className(), 'message' => Module::t('module', 'ERROR_EMAIL_EXISTS')],
            ['email', 'string', 'max' => 255],
					
            ['text', 'required'],
            ['text', 'filter', 'filter' => 'trim'],
						['text', 'string', 'max' => 999],
					
            ['url', 'url'],
            ['url', 'filter', 'filter' => 'trim'],
            ['url', 'string', 'max' => 255],
				
           ['verifyCode', 'captcha', 'captchaAction' => '/main/default/captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Module::t('module', 'GUESTBOOK_NAME'),
            'email' => Module::t('module', 'GUESTBOOK_EMAIL'),
            'url' => Module::t('module', 'GUESTBOOK_URL'),
            'text' => Module::t('module', 'GUESTBOOK_TEXT'),
            'verifyCode' => Module::t('module', 'GUESTBOOK_VERIFY_CODE'),
        ];
    }
		
		public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
										ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => false,
                ],
                
            ],
        ];
    }
		
		public function insGB() {

				$data = new Guestbook;
				$data->username = $this->username;
				$data->email = $this->email;
				$data->url = $this->url;
				$data->text = $this->text;
				
				return $data;

		}
		
		public function emailGB()
    {
//        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo([Yii::$app->params['adminEmail'] => Yii::$app->name])
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setReplyTo([$this->email => $this->username])
                ->setSubject('Новое сообщение в гостевой книге')
                ->setHtmlBody('<p>На сайте KuklaStadt посетитель <b>'. $this->username.'</b> оставил сообщение в гостевой книге: </p><p>'. $this->text.'</p><p>Электронная почта автора сообщения: '.$this->email.'</p><p>Сайт автора сообщения: '.$this->url.'</p>')
                ->send();

            return true;
//        } else {
//            return false;
//        }
    }


}

