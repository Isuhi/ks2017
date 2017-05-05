<?php
 
use yii\helpers\Html;
use app\modules\admin\Module;
use app\modules\user\Module as UserModule;
 
/* @var $this yii\web\View */
/* @var $model \app\modules\user\models\User */
 
$this->title = Module::t('module', 'ADMIN');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_CATEGORIES'), ['main/categories/index'], ['class' => 'btn btn-primary']) ?>
		</p>
    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_TYPES'), ['main/types/index'], ['class' => 'btn btn-primary']) ?>
		</p>
    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_ARTICLES'), ['main/articles/index'], ['class' => 'btn btn-primary']) ?>
		</p> 
    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_STATICPAGES'), ['main/staticpages/index'], ['class' => 'btn btn-primary']) ?>
		</p> 
    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_NEWS'), ['main/news/index'], ['class' => 'btn btn-primary']) ?>
		</p> 
    <p>
        <?= Html::a(UserModule::t('module', 'NAV_ADMIN_GUESTBOOK'), ['main/guestbook/index'], ['class' => 'btn btn-primary']) ?>
		</p> 
    <p>
        <?= Html::a(UserModule::t('module', 'ADMIN_USERS'), ['user/default/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
