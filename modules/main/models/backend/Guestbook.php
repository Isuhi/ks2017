<?php

namespace app\modules\main\models\backend;

use Yii;
use app\modules\main\Module;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "{{%guestbook}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $url
 * @property integer $created_at
 * @property string $text
 * @property integer $visible
 */
class Guestbook extends ActiveRecord
{
	
		public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
										ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => false,
                ],
                
            ],
        ];
    }

    public static function tableName()
    {
        return '{{%guestbook}}';
    }


    public function rules()
    {
        return [
            [['username', 'email', 'text'], 'required'],
            [['created_at', 'visible'], 'integer'],
            [['text'], 'string'],
            [['username', 'email', 'url'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Module::t('module', 'ID'),
            'username' => Module::t('module', 'NAME'),
            'email' => Module::t('module', 'EMAIL'),
            'url' => Module::t('module', 'URL'),
            'created_at' => Module::t('module', 'CREATED_AT'),
            'text' => Module::t('module', 'TEXT'),
            'visible' => Module::t('module', 'VISIBLE'),
        ];
    }
		

    
}
