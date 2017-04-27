<?php
 
use app\components\widgets\Alert;
use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

 
/* @var $this \yii\web\View */
/* @var $content string */
 
?>
<?php $this->beginContent('@app/views/layouts/layout.php'); ?>
<header class="header_main">
		<h1 class="visually-hidden">KuklaStadt - сайт о куклах, об истории кукол, о жизни кукол, обо всем, что их окружает и создано для них</h1>
<?php
NavBar::begin([
    'brandLabel' => 'KuklaStadt - сайт о куклах',
/*    'brandLabel' => Yii::$app->name,*/

/*   'brandLabel' => '<img src="/web/img/fav_30.png" alt="На  главную страницу" title="На  главную страницу">',*/
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'activateParents' => true,
    'items' => array_filter([
        ['label' => Yii::t('app', 'NAV_HOME'), 
						'url' => ['/main/default/index']
				],
        ['label' => Yii::t('app', 'NAV_NEWS'), 
						'url' => ['/main/default/about'],
				],
        ['label' => Yii::t('app', 'NAV_MAP'), 
						'url' => ['/main/default/about'],
				],
        ['label' => Yii::t('app', 'NAV_ABOUT'), 
						'url' => ['/main/default/about'],
				],
        ['label' => Yii::t('app', 'NAV_CONTACT'), 'url' => ['/main/contact/index']],
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_SIGNUP'), 'url' => ['/user/default/signup']] :
            false,
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login']] :
            false,
        Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL) ?
            ['label' => Yii::t('app', 'NAV_ADMIN'), 'url' => ['/admin/default/index']] :
            false,
        !Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_PROFILE'), 'items' => [
                ['label' => Yii::t('app', 'NAV_PROFILE'), 'url' => ['/user/profile/index']],
                ['label' => Yii::t('app', 'NAV_LOGOUT'),
                    'url' => ['/user/default/logout'],
                    'linkOptions' => ['data-method' => 'post']]
            ]] :
            false,
			]),
		]);
    NavBar::end();
?>
		<div class="header_main__logo">
			<a class="on-main" href="/"></a>
			<a href="/" title="На главную страницу"><img src="/web/img/logo4.png" alt="KuklaStadt - сайт о куклах" ></a>
		</div><!-- ./header_main__logo -->
</header><!-- ./header_main -->
<!--<div class="container">-->
    <?php// echo Breadcrumbs::widget([
//        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//    ]) ?>
    <?php // echo Alert::widget() ?>
    <?= $content ?>
<!--</div>-->
 
<?php $this->endContent(); ?>