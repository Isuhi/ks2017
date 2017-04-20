<?php

namespace app\modules\main\models\backend;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\modules\main\Module;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property integer $categories_id
 * @property integer $type_id
 * @property string $keywords
 * @property string $description
 * @property string $anons
 * @property string $text
 * @property string $author
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $img
 * @property integer $view
 * @property integer $visible
 * @property integer $comment
 * @property integer $master_class
 *
 * @property Categories $categories
 * @property Types $type
 */
class Articles extends \yii\db\ActiveRecord
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
        return '{{%articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['categories_id', 'type_id', 'created_at', 'updated_at', 'view', 'visible', 'comment', 'master_class'], 'integer'],
            [['keywords', 'description', 'anons', 'text'], 'string'],
            [['title', 'alias', 'author', 'img'], 'string', 'max' => 255],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categories_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Types::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'categories_id' => Module::t('module', 'CATEGORIES'),
            'type_id' => Module::t('module', 'TYPES'),
            'keywords' => Module::t('module', 'KEYWORDS'),
            'description' => Module::t('module', 'DESCRIPTION'),
            'anons' => Module::t('module', 'ANONS'),
            'text' => Module::t('module', 'TEXT'),
            'author' => Module::t('module', 'AUTHOR'),
            'created_at' => Module::t('module', 'CREATED_AT'),
            'updated_at' => Module::t('module', 'UPDATE_AP'),
            'img' => Module::t('module', 'IMG_ARTICLE'),
            'view' => Module::t('module', 'COUNT_VIEW'),
            'visible' => Module::t('module', 'VISIBLE'),
            'comment' => Module::t('module', 'COMMENT'),
            'master_class' => Module::t('module', 'MASTER_CLASS'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'categories_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\main\models\backend\guery\ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\main\models\backend\guery\ArticlesQuery(get_called_class());
    }
}
