<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use app\modules\main\models\backend\Categories;

/**
 * Description of MenuCategoriesWidget
 *
 * @author Isuhi
 */
class MenuCategoriesWidget extends Widget{
	
	public $data;
	public $tree;
	public $menuHtml;
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		$this->data = Categories::find()->where(['visible' => '1'])->indexBy('id')->asArray()->all();
		$this->data = $this->getTree();
		$this->data = $this->getMenuHtml($this->data);

		return $this->data;
	}  
	
	protected function getTree() {
		$tree = [];
		foreach ($this->data as $id => &$node) {
			if  (!$node['parent_id']){
				$tree[$id] = &$node;
			}
			else{
				$this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
			}
		} 
		return $tree;
	}
	
	protected function getMenuHtml($tree) {
		$str = '';
		foreach ($tree as $categories) {
			$str .= $this->catToTemplate($categories);
		}
		return $str;
	}
	
	protected function catToTemplate($categories) {
		ob_start();
		include __DIR__ . '/views/menuCategories.php' ;
		return ob_get_clean();
	}
	
}
