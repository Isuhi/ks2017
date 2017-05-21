<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//use app\modules\main\Module;
use app\components\widgets\Alert;
use app\modules\user\Module;
use yii\widgets\Breadcrumbs;


//$this->title = Module::t('module', 'TITLE_ABOUT');
$this->params['breadcrumbs'][] = $this->title;
?>
		<aside class="search-banner__banner">
			<div class="search-banner__banner-wrap"> 
				<?=  Html::a(Html::img('/web/files/global/reclama/ks_500x50_valjanaja_v2.jpg',	['width' => 500,'height' => 50,	'alt' => 'Валяные куклы и игрушки на сайте KuklaStadt'	]),	'/type/kukly-svalyanye-iz-shersti', ['alt' => 'Все валяные куклы и игрушки',	'title' => 'Все валяные куклы и игрушки'])?>
			</div>
		</aside><!-- ./search-banner__banner -->
		<aside class="search-banner__banner">
			<div class="search-banner__banner-wrap"> 
				<?=  Html::a(Html::img('/web/files/global/reclama/ks_500x50_narodnaja_v3.jpg', ['width' => 500, 'height' => 50, 'alt' => 'Народные тряпичные куклы на сайте KuklaStadt']), '/category/tryapichnaya-kukla', ['alt' => 'Все тряпичные народные куклы','title' => 'Все тряпичные народные куклы'])?>
			</div>
		</aside><!-- ./search-banner__banner -->
	</section>
	<section class="m-all">
		<section class="m-all__m-content">
			<div class="m-content__wrapper">
					<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
					<?= Alert::widget() ?>
					<header class="text-header">
						<h2 class="text-header__h2-welcome">
							<?php if(!Yii::$app->user->isGuest) :?>
							Здравствуйте, <?=$model->username ?>!
							<?php else:?>
							Здравствуйте, уважаемые посетители сайта "KuklaStadt"!</h2>
						<?php endif;?>
					</header><!-- ./text-header -->
					<header class="text-header">
						<h1 class="text-header__h1"><?= $about -> title ?></h1>
					</header><!-- ./text-header -->
				<article class="article-text">
<!--<div class="main-default-about">-->
		<?= $about->text ?>

<!--</div>-->
		<div class="article-end">
			<p>. . . . .</p>
		</div><!-- /.article-end -->
		<aside class="social-seti">
			<p>Вы можете поделиться своим мнением об этой странице со всеми друзьями и знакомыми в социальных сетях:</p>
			<div class="ya-share2 social-buttons" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,lj"></div>
		</aside>
		</article><!-- ./article-text -->
			<aside class="m-content__banner m-content__banner-middle">
				<div class="banner_c_c banner_728x90"> 
					<a href="https://mchost.ru/?referer=4180319423" target=_blank><img src="//ban.mchost.ru/b/728x90.jpg" width="728" height="90" border="0" alt="Хостинг от Макхост" /></a>
				</div>
			</aside><!-- ./m-content__banner m-content__banner-middle -->
			</div>
				<section class="m-all__m-sidebar m-sidebar m-sidebar__rightbar">
					<aside class="m-sidebar__reklama">
						<div class="block_reklami-right">
							<?=  Html::a(Html::img('/web/files/global/reclama/ks_240x400_mc.gif', ['alt' => 'Мастер-классы кукол на сайте KuklaStadt']), '/master-classes', ['alt' => 'Мастер-классы кукол на сайте KuklaStadt','title' => 'Мастер-классы кукол на сайте KuklaStadt'])?>
						</div>
					</aside>
					<aside class="m-sidebar__reklama">
						<div class="block_reklami-right">
							<?=  Html::a(Html::img('/web/files/global/reclama/ks_240x400_val.gif', ['alt' => 'Валяные игрушки на сайте KuklaStadt']), '/type/kukly-svalyanye-iz-shersti', ['alt' => 'Валяные игрушки на сайте KuklaStadt','title' => 'Валяные игрушки на сайте KuklaStadt'])?>
						</div><!-- /.m-content__wrapper -->
					</aside>
				</section><!-- ./m-all__m-sidebar m-sidebar__rightbar -->
		</section><!-- /.m-all__m-content -->
		
