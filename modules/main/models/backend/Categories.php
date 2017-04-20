<?php

namespace app\modules\main\models\backend;

use Yii;
use app\modules\main\Module;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property string $keywords
 * @property string $description
 * @property string $text
 * @property integer $visible
 *
 * @property Categories $parent
 * @property Categories[] $categories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'visible'], 'integer'],
            [['name', 'alias'], 'required'],
            [['keywords', 'description', 'text'], 'string'],
            [['name', 'alias'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => Module::t('module', 'ADMIN_PARENT_ID'),
            'name' => Module::t('module', 'ADMIN_NAME'),
            'alias' => Module::t('module', 'ADMIN_ALIAS'),
            'keywords' => Module::t('module', 'ADMIN_KEYWORDS'),
            'description' => Module::t('module', 'ADMIN_DESCRIPTION'),
            'text' => Module::t('module', 'ADMIN_TEXT'),
            'visible' => Module::t('module', 'ADMIN_VISIBLE'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['parent_id' => 'id']);
    }
		
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['categories_id' => 'id']);
    }
}
