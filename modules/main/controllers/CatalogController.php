<?php

namespace app\modules\main\controllers;

use yii\web\Controller;
use app\components\BehaviorsStaticPages;
use app\components\BehaviorsGetDataUser;
use app\components\BehaviorsMetaTags;
use app\modules\main\models\backend\Categories;
use app\modules\main\models\backend\Types;
use app\modules\main\models\backend\Articles;
use Yii;

use yii\data\Pagination;

class CatalogController extends Controller
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
        ];
    }
	
    public function actionCategory($alias)
    {
			$categories = Categories::findOne(['alias' => $alias]);
			if (empty($categories))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');		
			$catId[] = $categories->id;
			if($categories->categories){
				foreach ($categories->categories as $childrenCat){
					$catId[] = $childrenCat->id;
					//	 здесь $catId - массив id дочерних категорий
				}
			}
//	 а теперь $catId - массив id ВСЕХ категорий (родительской и дочерних)
//		$articles = Articles::find()->where(['category_id' => $id, 'visible' => '1'])->orderBy('id DESC')->limit(5)->all();
//		Получаем статьи категорий
			$query = Articles::find()->where(['categories_id' => $catId, 'visible' => '1']);
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$articles = $query->offset($pages->offset)->limit($pages->limit)->orderBy('id DESC')->all();
			$this->setMeta($categories->name, $categories->keywords, $categories->description);
			$model = $this->findModel();
			if($categories->parent_id > 0){
				$categoryparent = $categories->parent_id;
				$categoriesParent = Categories::findOne(['id' => $categoryparent]);
			}
			return $this->render('category', compact('articles', 'pages' , 'categories', 'categoriesParent', 'model'));
    }

    public function actionAllArticles()
    {
			$query = Articles::find()->select(['title', 'alias', 'anons', 'img', 'created_at', 'author', 'view'])->where(['visible' => '1'])->orderBy('id DESC');
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$articles = $query->offset($pages->offset)->limit($pages->limit)->all();
			if (empty($articles))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$this->setMeta('Каталог - все статьи', 'Все статьи сайта Kuklastadt', 'Полный каталог статей сайта KuklaStadt');
			$model = $this->findModel();
			return $this->render('all-articles', compact('articles', 'pages', 'model'));
    }

    public function actionMasterClasses()
    {
			$query = Articles::find()->select(['title', 'alias', 'anons', 'img', 'created_at', 'author', 'view'])->where(['visible' => '1', 'master_class' => '1'])->orderBy('id DESC');
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$articles = $query->offset($pages->offset)->limit($pages->limit)->all();
			if (empty($articles))
			throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$this->setMeta('Каталог - мастер-классы', 'каталог, мастер-классы', 'Полный каталог статей сайта KuklaStadt, в которых есть мастер-классы');
			$model = $this->findModel();
		return $this->render('master-classes', compact('articles', 'pages', 'model'));
		}
    

    public function actionType($alias)
    {
			$types = Types::findOne(['alias' => $alias]);
			if (empty($types))
				throw new \yii\web\HttpException(404, 'Страница не найдена.');
			$typId[] = $types->id;
			if($types->types){
				foreach ($types->types as $childrenTyp){
					$typId[] = $childrenTyp->id;
				}
			}
			$query = Articles::find()->where(['type_id' => $typId, 'visible' => '1'])->orderBy('id DESC');
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$articles = $query->offset($pages->offset)->limit($pages->limit)->all();
			$this->setMeta($types->name, $types->keywords, $types->description);
			$model = $this->findModel();
			if($types->parent_id > 0){
				$typeparent = $types->parent_id;
				$typesParent = Types::findOne(['id' => $typeparent]);
			}
			return $this->render('type', compact('articles', 'pages', 'types', 'model',  'typesParent'));
    }
		
		public function actionSearch(){
			$search = trim(Yii::$app->request->get('search'));
			$this->setMeta('Поиск по: '. $search);
			if (!$search)
	//			$this->setMeta('Неверный запрос');
				return $this->render('search');
			$query = Articles::find()->where(['like', 'text', $search]);
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$articles = $query->offset($pages->offset)->limit($pages->limit)->all();
			$model = $this->findModel();
			
			return $this->render('search', compact('articles', 'pages' , 'search', 'model'));
		}

}
