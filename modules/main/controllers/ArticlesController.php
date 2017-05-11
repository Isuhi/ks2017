<?php

namespace app\modules\main\controllers;

use yii\web\Controller;
use app\modules\main\models\backend\Categories;
use app\modules\main\models\backend\Articles;
use app\components\BehaviorsGetDataUser;
use app\components\BehaviorsMetaTags;
use Yii;

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
		return $this->render('view', compact('articles', 'categoriesParent', 'model'));
		
	}
	
}
