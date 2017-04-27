<?php

namespace app\modules\main\controllers;
use app\modules\user\models\User;
use Yii;

use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
		public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
			if ($this->findModel()){
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
			}
			return $this->render('index');
			
    }
		
		private function findModel()
    {
			if(!Yii::$app->user->isGuest){
				return User::findOne(Yii::$app->user->identity->getId());
			}
			return false;
			
        
    }
		/**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
