<?php
 
use app\components\widgets\Alert;
use app\modules\admin\Module;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
 
/* @var $this \yii\web\View */
/* @var $content string */
 
/** @var \yii\web\Controller $context */
$context = $this->context;
 
if (isset($this->params['breadcrumbs'])) {
    $panelBreadcrumbs = [['label' => Module::t('module', 'ADMIN'), 'url' => ['/admin/default/index']]];
    $breadcrumbs = $this->params['breadcrumbs'];
} else {
    $panelBreadcrumbs = [Module::t('module', 'ADMIN')];
    $breadcrumbs = [];
}
?>
<?php $this->beginContent('@app/views/layouts/layout_admin.php'); ?>
 <header class="header_admin">  
<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'activateParents' => true,
    'items' => array_filter([
			['label' => Yii::t('app', 'ADMIN'), 'items'=> [
        ['label' => Yii::t('app', 'NAV_ADMIN'), 'url' => ['/admin/default/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_CATEGORIES'), 'url' => ['/admin/main/categories/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_TYPES'), 'url' => ['/admin/main/types/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_ARTICLES'), 'url' => ['/admin/main/articles/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_STATICPAGES'), 'url' => ['/admin/main/staticpages/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_NEWS'), 'url' => ['/admin/main/news/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_GUESTBOOK'), 'url' => ['/admin/main/guestbook/index']],
        ['label' => Yii::t('app', 'NAV_ADMIN_USERS'), 'url' => ['/admin/user/default/index'], 'active' => $context->module->id == 'user'],
        ['label' => Yii::t('app', 'NAV_LOGOUT'), 'url' => ['/user/default/logout'], 'linkOptions' => ['data-method' => 'post']]
			]]
    ]),
]);
NavBar::end();
?>

</header><!-- ./header_main -->
	<section class="m-all">
		<section class="m-all__m-content">
			<div class="m-content__wrapper">
				<article class="m-content__text">
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => ArrayHelper::merge($panelBreadcrumbs, $breadcrumbs),
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
</article><!-- ./m-content__text -->
</div>
</section><!-- /.m-all__m-content -->
</section><!-- /.m-all -->
 
<?php $this->endContent(); ?>

