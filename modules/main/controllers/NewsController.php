<?php

namespace app\modules\main\controllers;

use Yii;
use app\components\BehaviorsGetDataUser;
use app\modules\main\models\backend\News;

class NewsController extends \yii\web\Controller
{
		public function behaviors() {
			return [
				BehaviorsGetDataUser::className(),
			];			
		}
		
    public function actionView()
    {
			$model = $this->findModel();
			$alias = Yii::$app->request->get('alias');
			$oneNews = News::findOne(['alias' => $alias, 'visible' => '1']);	
			return $this->render('view', compact('model', 'oneNews'));
       
    }

}
