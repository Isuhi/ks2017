<?php

namespace app\modules\main\models\backend;

use Yii;
use app\modules\main\Module;

/**
 * This is the model class for table "{{%staticpages}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $keywords
 * @property string $description
 * @property string $text
 * @property integer $visible
 * @property integer $position
 */
class Staticpages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%staticpages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keywords', 'description', 'text'], 'string'],
            [['visible', 'position'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('module', 'ID'),
            'title' => Module::t('module', 'TITLE'),
            'alias' => Module::t('module', 'ALIAS'),
						'keywords' => Module::t('module', 'KEYWORDS'),
            'description' => Module::t('module', 'DESCRIPTION'),
            'text' => Module::t('module', 'TEXT'),
            'visible' => Module::t('module', 'VISIBLE'),
            'position' => Module::t('module', 'POSITION'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\main\models\backend\guery\StaticpagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\main\models\backend\guery\StaticpagesQuery(get_called_class());
    }
		
//		public static function topMenu() {
//			$item =[];
//			$staticPages = Staticpages::find()->select(['id', 'title', 'alias'])->where(['visible' => '1'])->orderBy('position')->all();
//			foreach ($staticPages as $staticPage) {
//				$item[] = [
//					'label' => $staticPage->title,
//					'url' => ['/site', 'link' => $staticPage->alias]
//				];				
//			}
//			return $item;
//		}
		

	
}
