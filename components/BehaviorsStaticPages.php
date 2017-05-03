<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\base\Behavior;
use app\modules\main\models\backend\Staticpages;

/**
 * Description of BehaviorsStaticPages
 *
 * @author Isuhi
 */
class BehaviorsStaticPages extends Behavior {
	
	public  function getStaticPages($alias){
			$data = Staticpages::findOne(['alias' => $alias, 'visible' => 1]);
			return $data;
		}
}
