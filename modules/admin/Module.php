<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use app\modules\admin\rbac\Rbac;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
		
		public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Rbac::PERMISSION_ADMIN_PANEL],
                    ],
                ],
            ],
        ];
    }

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
		
		public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/admin/' . $category, $message, $params, $language);
    }
}
