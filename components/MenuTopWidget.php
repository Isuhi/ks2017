<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use app\modules\main\models\backend\Staticpages;
/**
 * Description of MenuTopWidget
 *
 * @author Isuhi
 */
class MenuTopWidget extends Widget{
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		$staticPages = Staticpages::find()->select(['id', 'title', 'link'])->where(['visible' => '1'])->orderBy('position')->all();
		
		return $this->render('menuStaticpages', compact('staticPages'));
	}
	
}