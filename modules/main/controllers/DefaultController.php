<?php

namespace app\modules\main\controllers;
use app\modules\user\models\User;
use Yii;
use app\modules\main\models\backend\Staticpages;
use app\components\BehaviorsStaticPages;
use app\components\BehaviorsGetDataUser;
use yii\web\Controller;
use app\modules\main\models\backend\Articles;
use app\modules\main\models\backend\News;
use yii\data\Pagination;

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
	
}
