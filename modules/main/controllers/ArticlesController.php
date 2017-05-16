<?php

namespace app\modules\main\controllers;

use yii\web\Controller;
use app\modules\main\models\backend\Categories;
use app\modules\main\models\backend\Articles;
use app\modules\main\models\backend\Comments;
use app\components\BehaviorsGetDataUser;
use app\components\BehaviorsMetaTags;
use Yii;
use app\modules\main\models\form\CommentsForm;
use app\modules\admin\rbac\Rbac as AdminRbac;
use app\modules\user\models\User;

class ArticlesController extends Controller{
	
		public function behaviors() {
			return [
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
	
	public function actionView(){
		$alias = Yii::$app->request->get('alias');
		$articles = Articles::findOne(['alias' => $alias, 'visible' => '1']);
		if (empty($articles))
			throw new \yii\web\HttpException(404, 'Страница не найдена.');
		$this->setMeta($articles->title, $articles->keywords, $articles->description);
		$model = $this->findModel();
		if($articles->categories->parent_id > 0){
			$categoryparent = $articles->categories->parent_id;
			$categoriesParent = Categories::findOne(['id' => $categoryparent]);
		}
		$articles->updateCounters(['view' => 1]);
		$article_id = Articles::find()->select('id')->where(['alias' => $alias])->asArray()->limit(1)->one();
//		debug($article_id);
		$countComments = Comments::find()->where(['article_id' => $article_id, 'visible' => '1'])->count();
//	===============================================	Комментарии
		
		 $commentForm = new CommentsForm();
			if ($user = Yii::$app->user->identity) {
				$commentForm->username = $user->username;
				$commentForm->email = $user->email;
			}
			if(Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)){
				$commentForm->role = 'admin';
			}elseif(!Yii::$app->user->isGuest){
				$commentForm->role = 'user';
			}else {
				$commentForm->role = 'guest';
			}
			
			$commentForm->article_id = $article_id['id'];

			$commentForm->parent_id = Yii::$app->request->post()[CommentsForm]['parent_id'];
			if($commentForm->load(Yii::$app->request->post())){

//debug($commentForm);				
				if(Yii::$app->user->isGuest){
					if($this->un($commentForm->username) || $this->em($commentForm->email)){
						Yii::$app->session->setFlash('error', 'Используются данные зарегистрированного пользователя. Войдите на сайт с этими данными или используйте другие данные.');
						return $this->refresh();
					}
				}				
				if($commentForm->validate()){					
					if($commentForm->insComment()->save()){
						$commentForm->emailComment($articles->title, $articles->alias);
						if($commentForm->parent_id > 0){
							$parentEmail = Comments::find()->select('email')->where(['parent_id' => $commentForm->parent_id])->asArray()->one();
//							debug($parentEmail['email']);
							$commentForm->emailParentComment($parentEmail['email'], $articles->alias);
						}
						Yii::$app->session->setFlash('success', 'Ваш комментарий принят, и его уже видно всем!');
						return $this->refresh();
					}
					else{
						Yii::$app->session->setFlash('error', 'Ой - ой - ой!!!');
						Yii::error('Ошибка при сохранении комментария');
						return $this->refresh();
					}
				}
				else{
					Yii::$app->session->setFlash('error', 'Введены неверные данные');	
				}
			}
//		/Комментарии ==============================================		
		return $this->render('view', compact('articles', 'categoriesParent', 'model', 'countComments', 'commentForm'));
		
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
