<?php

namespace app\modules\main\models\backend;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\modules\main\Module;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $keywords
 * @property string $description
 * @property string $anons
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $visible
 */
class News extends \yii\db\ActiveRecord
{
		public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['keywords', 'description', 'anons', 'text'], 'string'],
            [['created_at', 'updated_at', 'visible'], 'integer'],
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
            'anons' => Module::t('module', 'ANONS'),
            'text' => Module::t('module', 'TEXT'),
            'created_at' => Module::t('module', 'CREATED_AT'),
            'updated_at' => Module::t('module', 'UPDATED_AT'),
            'visible' => Module::t('module', 'VISIBLE'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\main\models\backend\guery\NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\main\models\backend\guery\NewsQuery(get_called_class());
    }
}
