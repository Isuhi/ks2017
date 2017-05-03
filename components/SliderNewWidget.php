<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use app\modules\main\models\backend\Articles;

/**
 * Description of SliderNewWidget
 *
 * @author Isuhi
 */
class SliderNewWidget extends Widget{
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		$newArticles = Articles::find()->select(['id', 'title', 'alias', 'img'])->where(['visible' => '1'])->orderBy('id DESC')->limit(10)->all();
		
		return $this->render('sliderNew', compact('newArticles'));
	}
	
}