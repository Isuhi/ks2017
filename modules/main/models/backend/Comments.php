<?php

namespace app\modules\main\models\backend;

use Yii;
use app\modules\main\Module;
use yii\behaviors\TimestampBehavior;
use app\modules\main\models\backend\guery\CommentsQuery;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $article_id
 * @property string $username
 * @property string $email
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $text
 * @property integer $visible
 *
 * @property Articles $article
 * @property Comments $parent
 * @property Comments[] $comments
 */
class Comments extends \yii\db\ActiveRecord
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
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'article_id', 'created_at', 'updated_at', 'visible'], 'integer'],
            [['username', 'email', 'text'], 'required'],
            [['text', 'role'], 'string'],
            [['username', 'email', 'url', 'role'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comments::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('module', 'ID'),
            'parent_id' => Module::t('module', 'PARENT_ID'),
            'article_id' => Module::t('module', 'ARTICLE_ID'),
            'username' => Module::t('module', 'USERNAME'),
            'email' => Module::t('module', 'EMAIL'),
            'url' => Module::t('module', 'URL'),
            'created_at' => Module::t('module', 'CREATED_AT'),
            'updated_at' => Module::t('module', 'UPDATED_AT'),
            'text' => Module::t('module', 'TEXT'),
            'visible' => Module::t('module', 'VISIBLE'),
            'role' => Module::t('module', 'ROLE'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Comments::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['parent_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }
}
