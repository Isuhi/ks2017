<?php
use yii\helpers\Html;
use app\components\widgets\Alert;
use app\modules\main\Module;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = Module::t('module', 'TITLE_GUESTBOOK');
$this->params['breadcrumbs'][] = $this->title;
?>
	<aside class="search-banner__banner">
		<div class="search-banner__banner-wrap"> 
			<a href="#" target=_blank><img src="/web/files/global/reclama/ks_500x50_narodnaja_v3.jpg" width="500" height="50" border="0" alt="dif" /></a>
		</div>
	</aside><!-- ./search-banner__banner -->
	<aside class="search-banner__banner">
		<div class="search-banner__banner-wrap"> 
			<a href="#" target=_blank><img src="/web/files/global/reclama/ks_500x50_valjanaja_v2.jpg" width="500" height="50" border="0" alt="ssd" /></a>
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
						<h1 class="text-header__h1"><?= $guestbook-> title ?></h1>
					</header><!-- ./text-header -->
				<article class="article-text">
		<?= $guestbook->text ?>
					<aside class="guestbook-form">
						<?php $form = ActiveForm::begin(); ?>
							<?= $form->field($data,  'username') ?>
							<?= $form->field($data,  'email') ?>
							<?= $form->field($data,  'url') ?>
							<?= $form->field($data,  'text')->textarea(['rows' => 6])?>
						<?php  echo $form->field($data, 'verifyCode')->widget(Captcha::className(), [
                'captchaAction' => '/main/default/captcha',
               'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>
						<div class="form-group">
							<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
						</div>
						<?php ActiveForm::end(); ?>
					</aside>
				<aside class="guestbook-comment">
				<header class="text-header">
					<h3 class="text-header__h3">Все сообщения:</h3>
					<p>(всего сообщений - <?= $pages->totalCount ?>)</p>
				</header><!-- ./text-header -->
					<ul class="guestbook-comment__items">
				<?php foreach ($allReviews as $review): ?>
						<?php // debug($allReviews);					 exit() ?>
						<li class="guestbook-comment__item">
							<div class="guestbook-comment__data">
								<p class="guestbook-comment__login"><?= $review->username ?></p>

								<p class="guestbook-comment__date"><?= Yii::$app->formatter->asDate($review->created_at, 'dd-MM-yyyy');?> г.</p>
							</div>
							<div class="guestbook-comment__text">
								<p><?= strip_tags($review->text) ?></p>
							</div>
						</li>
				<?php endforeach;?>
					</ul>					
				</aside>
		</article><!-- ./article-text -->
				<aside class="my_pagination">
					<?= \yii\widgets\LinkPager::widget(['pagination' => $pages,]); ?>	
				</aside>
		<div class="article-end">
			<p>. . . . .</p>
		</div><!-- /.article-end -->
		<aside class="social-seti">
			<p>Вы можете поделиться своим мнением об этой странице со всеми друзьями и знакомыми в социальных сетях:</p>
			<div class="ya-share2 social-buttons" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,lj"></div>
		</aside>
			<aside class="m-content__banner m-content__banner-middle">
				<div class="banner_c_c banner_728x90"> 
					<a href="https://mchost.ru/?referer=4180319423" target=_blank><img src="//ban.mchost.ru/b/728x90.jpg" width="728" height="90" border="0" alt="Хостинг от Макхост" /></a>
				</div>
			</aside><!-- ./m-content__banner m-content__banner-middle -->
			</div>
				<section class="m-all__m-sidebar m-sidebar m-sidebar__rightbar">
					<aside class="m-sidebar__reklama">
						<div class="block_reklami-right">
							<a href="http://suharikisdegtem.ru/"><img src="/web/files/global/reclama/ks_240x400_mc.gif" alt="Магазин подарков 'Сухарики с Дегтем'"></a>
						</div>
					</aside>
					<aside class="m-sidebar__reklama">
						<div class="block_reklami-right">
							<a href="http://suharikisdegtem.ru/"><img src="/web/files/global/reclama/ks_240x400_val.gif" alt="Магазин подарков 'Сухарики с Дегтем'"></a>
						</div><!-- /.m-content__wrapper -->
					</aside>
				</section><!-- ./m-all__m-sidebar m-sidebar__rightbar -->
		</section><!-- /.m-all__m-content -->
		


