<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\main\Module;
use yii\captcha\Captcha;
use yii\widgets\Breadcrumbs;
use app\components\widgets\Alert;
use app\modules\main\models\backend\Staticpages;

//$this->title = Module::t('module', 'TITLE_CONTACT');
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
			<article class="article-text">
				<div class="main-contact-index">
					<?= Breadcrumbs::widget([
						 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					 ]) ?>
					<?= Alert::widget() ?>
					<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
				<div class="alert alert-success">
					<?= Module::t('module', 'CONTACT_THANKS') ?>
				</div>
					<p>Обратите внимание: если вы включите отладчик Yii, вы сможете просматривать почтовое сообщение на панели почты отладчика.
						<?php if (Yii::$app->mailer->useFileTransport): ?>
					Поскольку приложение находится в режиме разработки, сообщение не отправляется, а сохраняется как файл в <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
					Пожалуйста, настройте <code> useFileTransport </code> свойство <code> mail </code>
					Компонент приложения должен быть ложным, чтобы отправлять электронную почту.
						<?php endif; ?>
					</p>
						<?php else: ?>
					<header class="text-header">
						<h2 class="text-header__h2-welcome">
							<?php if(!Yii::$app->user->isGuest) :?>
							Здравствуйте, <?=$model->name ?>!
							<?php else:?>
							Здравствуйте, уважаемые посетители сайта "KuklaStadt"!
							<?php endif;?>
						</h2>
					</header><!-- ./text-header -->
					<header class="text-header">
						<h1 class="text-header__h1"><?= $contact -> title ?></h1>
					</header><!-- ./text-header -->
					<?= $contact->text?>
					<div class="row">
						<div class="col-lg-9">
							<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
								<?= $form->field($model, 'name')->textInput() ?>
								<?= $form->field($model, 'email') ?>
								<?= $form->field($model, 'subject') ?>
								<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
								<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
	'captchaAction' => '/main/contact/captcha',
	'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
	]) ?>
								<div class="form-group">
										<?= Html::submitButton(Module::t('module', 'BUTTON_SEND'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
								</div>
							<?php ActiveForm::end(); ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
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
		
