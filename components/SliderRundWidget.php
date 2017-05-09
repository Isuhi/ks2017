<?php
namespace app\components;

use yii\base\Widget;
use app\modules\main\models\backend\Articles;

class SliderRundWidget extends Widget{

	public function init() {
		parent::init();
	}
	
	public function run() {
//		Получение всех id  статей в виде двумерного массива:
		$ids = Articles::find()->select(['id'])->where(['visible' => '1'])->asArray()->all();
////			Получаем одномерный массив, в котором значениями являются id статей:
//			$id = array_column($ids, 'id');
////			Меняем местами ключи и значения в предыдущем массиве, теперь id статей - его ключи:
//			$idf = array_flip($id);
////			Получаем n кол-во случайных элементов в виде массива, в котором id опять становятся значениями:
//			$idfr = array_rand($idf, 15); 
////			Из этого массива получаем строку, в которой id статей перечислены через запятую, причем последней запятой уже нет:
//			$idsfri = m_implode(",", $idfr);
//		Краткая запись:
			$idsfri = m_implode(",", array_rand(array_flip(array_column($ids, 'id')), 15));	
//			Так и не вышло вывести строку $idsfri параметром id - в запрос не уходил оператор IN...
//		$randArticles = Articles::find()->select(['id', 'title', 'mini_img'])->where(['in', 'id', $idsfri])->andWhere(['visible' => '1'])->all();	
//			Поэтому пришлось формировать запрос отдельно:
			$query = "SELECT `id`, `title`,`alias`, `img` FROM `ks2017_articles` WHERE (`id` IN ($idsfri)) AND (`visible`='1')";
			$randArticles = Articles::findBySql($query)->all();

//		Самый медленный вариант с rand():
//		$randArticles = Articles::find()->select(['id', 'title', 'mini_img'])->where(['visible' => '1'])->orderBy('rand()')->limit(15)->all();

		return $this->render('sliderRund', compact('randArticles'));
	}		
		
}
