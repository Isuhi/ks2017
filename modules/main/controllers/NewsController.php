<?php

namespace app\modules\main\controllers;

use Yii;
use app\components\BehaviorsGetDataUser;
use app\modules\main\models\backend\News;
use app\components\BehaviorsMetaTags;

class NewsController extends \yii\web\Controller
{
		public function behaviors() {
			return [
				BehaviorsGetDataUser::className(),
				BehaviorsMetaTags::className(),
			];			
		}
		
    public function actionView()
    {
			$model = $this->findModel();
			$alias = Yii::$app->request->get('alias');
			$oneNews = News::findOne(['alias' => $alias, 'visible' => '1']);
			$this->setMeta($oneNews->title, $oneNews->keywords, $oneNews->description);
			return $this->render('view', compact('model', 'oneNews'));
       
    }

}
