<?php

namespace app\modules\main\models\backend;

use Yii;
use app\modules\main\Module;

/**
 * This is the model class for table "{{%types}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property string $keywords
 * @property string $description
 * @property integer $visible
 * @property string $text
 *
 * @property Types $parent
 * @property Types[] $types
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%types}}';
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
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Types::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => Module::t('module', 'PARENT_TYPE'),
            'name' => Module::t('module', 'ADMIN_NAME'),
            'alias' => Module::t('module', 'ADMIN_ALIAS'),
            'keywords' => Module::t('module', 'ADMIN_KEYWORDS'),
            'description' => Module::t('module', 'ADMIN_DESCRIPTION'),
            'visible' => Module::t('module', 'ADMIN_VISIBLE'),
            'text' => Module::t('module', 'ADMIN_TEXT'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Types::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasMany(Types::className(), ['parent_id' => 'id']);
    }
		
		    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['types_id' => 'id']);
    }
}
