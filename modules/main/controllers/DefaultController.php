<?php

namespace app\modules\main\controllers;
//use app\modules\user\models\User;
use Yii;
use app\modules\main\models\backend\Staticpages;
use app\components\BehaviorsStaticPages;
use app\components\BehaviorsGetDataUser;
use app\components\BehaviorsMetaTags;
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
				BehaviorsMetaTags::className(),
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
			$newArticle = Articles::find()->select(['title', 'alias', 'anons', 'img', 'created_at'])->where(['visible' => '1'])->orderBy('id DESC')->limit(1)->one();			$this->setMeta('KuklaStadt - сайт о куклах', 'KuklaStadt - сайт о куклах и обо всем, что с ними связано.', 'KuklaStadt, сайт о куклах, куклы');
			return $this->render('index', compact( 'model', 'newArticle'));
    }
		
    public function actionAbout()
    {
			$about = $this->getStaticPages('about');
			if (empty($about))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$model = $this->findModel();	
			$this->setMeta($about->title, $about->keywords, $about->description);
			return $this->render('about', compact('about', 'model'));
    }
		
		public function actionMap(){
			$map = $this->getStaticPages('map');
			if (empty($map))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$model = $this->findModel();
			$listArticles = Articles::find()
														->select(['title', 'alias'])
														->where(['visible' => '1'])
														->orderBy('id DESC')
														->all();
			$countArticles = Articles::find()
														->where(['visible' => '1'])
														->count();
			$this->setMeta($map->title, $map->keywords, $map->description);
			return $this->render('map', compact('map', 'model', 'listArticles', 'countArticles'));
		}
		
		public function actionNews() {	
			$news = $this->getStaticPages('news');
			if (empty($news))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$model = $this->findModel();
			$query = News::find()->where(['visible' => '1'])->orderBy('id DESC');
			$pages = new Pagination([
														'totalCount' => $query->count(), 
														'pageSize' => 10, 
														'forcePageParam' => false, 
														'pageSizeParam' => false
				]);
			$allNews = $query->offset($pages->offset)->limit($pages->limit)->all();
			if (empty($allNews))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$this->setMeta($news->title, $news->keywords, $news->description);
			return $this->render('news', compact('model', 'news', 'allNews', 'pages'));
		}
		
		public function actionGuestbook() {
			$guestbook = $this->getStaticPages('guestbook');
			if (empty($guestbook))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
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
			$this->setMeta($guestbook->title, $guestbook->keywords, $guestbook->description);
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
