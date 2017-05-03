<?php

namespace app\modules\main\controllers;
 
use app\modules\main\models\form\ContactForm;
use yii\web\Controller;
use Yii;
use app\components\BehaviorsStaticPages;
 
class ContactController extends Controller
{
	
		public function behaviors() {
			return [
				BehaviorsStaticPages::className(),
			];			
		}
		
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
 
    public function actionIndex()
    {
			$contact = $this->getStaticPages('contacts');
        $model = new ContactForm();
				if ($user = Yii::$app->user->identity) {
            /** @var \app\modules\user\models\User $user */
            $model->name = $user->username;
            $model->email = $user->email;
        }
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
 
            return $this->refresh();
        } else {
            return $this->render('index',compact('model', 'contact'));
        }
    }
}

