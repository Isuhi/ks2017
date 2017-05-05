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
    public static function tableName()
    {
        return '{{%staticpages}}';
    }

    public function rules()
    {
        return [
            [['keywords', 'description', 'text'], 'string'],
            [['visible', 'position'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
        ];
    }

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

    public static function find()
    {
        return new \app\modules\main\models\backend\guery\StaticpagesQuery(get_called_class());
    }

		

	
}
