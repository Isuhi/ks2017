<?php

namespace app\modules\user;

//use yii\console\Application as ConsoleApplication;
use Yii;
/**
 * user module definition class
 */
class Module extends \yii\base\Module
{
	/**
     * @var string
     */
    public $defaultRole = 'user';
	/**
     * @var int
     */
    public $emailConfirmTokenExpire = 86400; // 1 days86400
    /**
     * @var int
     */
    public $passwordResetTokenExpire = 3600;
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\user\controllers';

    /**
     * @inheritdoc
     */
//    public function init()
//    {
//        parent::init();
//					 if (Yii::$app instanceof ConsoleApplication) {
//            $this->controllerNamespace = 'app\modules\user\commands';
//        }
//        // custom initialization code goes here
//    }
//		
		public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/user/' . $category, $message, $params, $language);
    }
}
