<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;
use app\modules\main\models\backend\Comments;
use Yii;
use app\modules\main\models\backend\Articles;

/**
 * Description of CommentsWidget
 *
 * @author Isuhi
 */
class CommentsWidget extends Widget{
	
	public $data;
	public $tree;
	public $menuHtml;
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		$alias = Yii::$app->request->get('alias');
		$article_id = Articles::find()->select('id')->where(['alias' => $alias])->asArray()->limit(1)->one();
		$this->data = Comments::find()->with('parent')->where(['article_id' => $article_id])->indexBy('id')->asArray()->all();
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
		foreach ($tree as $comments) {
			$str .= $this->catToTemplate($comments);
		}
		return $str;
	}
	
	protected function catToTemplate($comments) {
		ob_start();
		include __DIR__ . '/views/comments.php' ;
		return ob_get_clean();
	}
}
