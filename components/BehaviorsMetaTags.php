<?php

namespace app\components;

use yii\base\Behavior;
use Yii;

class BehaviorsMetaTags extends Behavior{
	
	public function setMeta($title = null, $keywords = null, $description = null) {
		
		Yii::$app->view->title = $title;
		Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
		Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
		
	}
}
