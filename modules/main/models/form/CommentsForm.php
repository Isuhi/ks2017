<?php

namespace app\modules\main\models\form;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\main\Module;
use yii\behaviors\TimestampBehavior;
use app\modules\main\models\backend\Comments;


class CommentsForm extends Model
{
    public $username;
    public $email;
    public $url;
    public $text;
    public $verifyCode;
    public $role;
    public $article_id;
    public $parent_id;
		
		const LONG_WORD = 35;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '/^[a-zа-яё0-9_\-\s]+$/uis'],
            ['username', 'string', 'min' => 4, 'max' => 100],
						['username', 'validatorLongWords'],
 
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
					
            ['text', 'required'],
            ['text', 'filter', 'filter' => 'trim'],
						['text', 'string', 'max' => 999],
						['text', 'validatorLongWords'],
					
            ['url', 'url'],
            ['url', 'filter', 'filter' => 'trim'],
						['text', 'filter', 'filter' => 'strip_tags'],
            ['url', 'string', 'max' => 255],
				
           ['verifyCode', 'captcha', 'captchaAction' => '/main/articles/captcha'],
        ];
    }
		
		public function validatorLongWords ( $attribute )
		{
				$parts = explode( ' ', $this->$attribute );
				foreach ( $parts as $word ) {
						if ( mb_strlen( $word ) > self::LONG_WORD ) { # Для UTF-8 и русского текста используем mb_strlen( $word )
								$this->addError( $attribute, 'В каком-то слове слишком много букв! Попробуйте использовать слова покороче.' );
								break; # или return;
						}
				}
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
            ],
        ];
    }
		
		public function insComment() {

				$commentForm = new Comments;
				$commentForm->username = $this->username;
				$commentForm->email = $this->email;
				$commentForm->url = $this->url;
				$commentForm->text = $this->text;
				$commentForm->article_id = $this->article_id;
				$commentForm->parent_id = $this->parent_id;
				$commentForm->role = $this->role;
				
				return $commentForm;

		}
		
		public function emailComment($title, $alias)
    {
            Yii::$app->mailer->compose()
                ->setTo([Yii::$app->params['adminEmail'] => Yii::$app->name])
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setReplyTo([$this->email => $this->username])
                ->setSubject('Новый комментарий на сайте KuklaStadt')
                ->setHtmlBody('<p>На сайте KuklaStadt посетитель <b>'. $this->username.'</b> оставил комментарий к статье: ' . $title . ': </p><p>'. $this->text.'</p><p>Электронная почта комментатора: '.$this->email.'</p><p>Сайт комментатора: '.$this->url.'</p><p>Ссылка на страницу со статьей: '. Yii::$app->urlManager->createAbsoluteUrl(['articles/'.$alias]) .'</p>')
                ->send();

            return true;
    }
		
		public function emailParentComment($email, $alias)
    {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setReplyTo([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setSubject('Комментарий на сайте KuklaStadt')
                ->setHtmlBody('<p>На ваш комментарий на сайте KuklaStadt кто-то ответил: </p><p>'. $this->text.'</p><p>Ссылка на страницу со статьей: '. Yii::$app->urlManager->createAbsoluteUrl(['articles/'.$alias]) .'</p>')
                ->send();

            return true;
    }
		
}

