<?php

namespace app\components;

use yii\base\Behavior;
use app\modules\user\models\User;
use Yii;

class BehaviorsGetDataUser extends Behavior {
		
	public function findModel()
    {
			if(!Yii::$app->user->isGuest){
				return User::findOne(Yii::$app->user->identity->getId());
			}
			return false;			     
    }
	
}
