<?php
namespace app\components;

use yii\base\Widget;
use app\modules\main\models\backend\Types;

class MenuTypesWidget extends Widget{

	public $data;
	public $tree;
	public $menuHtml;
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		$this->data = Types::find()->where(['visible' => '1'])->indexBy('id')->asArray()->all();
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
		foreach ($tree as $types) {
			$str .= $this->catToTemplate($types);
		}
		return $str;
	}
	
	protected function catToTemplate($types) {
		ob_start();
		include __DIR__ . '/views/menuTypes.php' ;
		return ob_get_clean();
	}
	
}
