<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\user\controllers\frontend;

use app\modules\user\forms\frontend\PasswordChangeForm;
use app\modules\user\forms\frontend\ProfileUpdateForm;
use app\modules\user\models\User;
use app\modules\user\Module;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
 
class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
 
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }
 
    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
		
		public function actionUpdate()
		{
				$user = $this->findModel();
				$model = new ProfileUpdateForm($user);

				if ($model->load(Yii::$app->request->post()) && $model->update()) {
						return $this->redirect(['index']);
				} else {
						return $this->render('update', [
								'model' => $model,
						]);
				}
		}
		
		public function actionPasswordChange()
    {
        $user = $this->findModel();
        $model = new PasswordChangeForm($user);
 
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                'model' => $model,
            ]);
        }
    }
}
