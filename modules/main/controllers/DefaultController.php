<?php

namespace app\modules\main\controllers;
//use app\modules\user\models\User;
use Yii;
use app\modules\main\models\backend\Staticpages;
use app\components\BehaviorsStaticPages;
use app\components\BehaviorsGetDataUser;
use yii\web\Controller;
use app\modules\main\models\backend\Articles;
use app\modules\main\models\backend\News;
use app\modules\main\models\backend\Guestbook;
use yii\data\Pagination;
use app\modules\main\models\form\GuestbookForm;
use yii\helpers\Html;
use app\modules\user\models\User;

class DefaultController extends Controller
{
		public function behaviors() {
			return [
				BehaviorsStaticPages::className(),
				BehaviorsGetDataUser::className(),
			];			
		}

		public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
						'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
			$model = $this->findModel();			
			return $this->render('index', compact( 'model'));
    }
		
    public function actionAbout()
    {
			$about = $this->getStaticPages('about');
			$model = $this->findModel();			
			return $this->render('about', compact('about', 'model'));
    }
		
		public function actionMap(){
			$map = $this->getStaticPages('map');
			$model = $this->findModel();
			$listArticles = Articles::find()
														->select(['title', 'alias'])
														->where(['visible' => '1'])
														->orderBy('id DESC')
														->all();
			$countArticles = Articles::find()
														->where(['visible' => '1'])
														->count();
			return $this->render('map', compact('map', 'model', 'listArticles', 'countArticles'));
		}
		
		public function actionNews() {	
			$news = $this->getStaticPages('news');
			$model = $this->findModel();
			$query = News::find()->where(['visible' => '1'])->orderBy('id DESC');
			$pages = new Pagination([
														'totalCount' => $query->count(), 
														'pageSize' => 10, 
														'forcePageParam' => false, 
														'pageSizeParam' => false
				]);
			$allNews = $query->offset($pages->offset)->limit($pages->limit)->all();
			return $this->render('news', compact('model', 'news', 'allNews', 'pages'));
		}
		
		public function actionGuestbook() {
			$guestbook = $this->getStaticPages('guestbook');
			$model = $this->findModel();
			$query = Guestbook::find()->where(['visible' => '1'])->orderBy('id DESC');
			$pages = new Pagination([
														'totalCount' => $query->count(), 
														'pageSize' => 10, 
														'forcePageParam' => false, 
														'pageSizeParam' => false
				]);
			$allReviews = $query->offset($pages->offset)->limit($pages->limit)->all();
			$data = new GuestbookForm();
			if ($user = Yii::$app->user->identity) {
				/** @var \app\modules\user\models\User $user */
				$data->username = $user->username;
				$data->email = $user->email;
			}			
			if($data->load(Yii::$app->request->post())){				
				if(Yii::$app->user->isGuest){
					if($this->un($data->username) || $this->em($data->email)){
						Yii::$app->session->setFlash('error', 'Используются данные зарегистрированного пользователя. Войдите на сайт с этими данными или используйте другие данные.');
						return $this->refresh();
					}
				}				
				if($data->validate()){					
					if($data->insGB()->save()){
//			debug($data);
			$data->emailGB();
						Yii::$app->session->setFlash('success', 'Сообщение принято, его уже видно');
						return $this->refresh();
					}
					else{
						Yii::$app->session->setFlash('error', 'Ой - ой - ой!!!');
						Yii::error('Ошибка при сохранении сообщения в гостевой книге');
						return $this->refresh();
					}
				}
				else{
					Yii::$app->session->setFlash('error', 'Введены неверные данные');	
				}
			}

			return $this->render('guestbook', compact('data','model', 'guestbook', 'pages', 'allReviews'));
		}
		
		public function un($username) {
			$res = User::findOne(['username' => $username]);
			return $res;
		}
		public function em($email) {
			$res = User::findOne(['email' => $email]);
			return $res;
		}
		
	
}
