<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\user\Module;
 
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\user\models\LoginForm */
 
$this->title = Module::t('module', 'TITLE_LOGIN');
$this->params['breadcrumbs'][] = $this->title;
?>
<header class="header_main">
		<h1 class="visually-hidden">KuklaStadt - сайт о куклах, об истории кукол, о жизни кукол, обо всем, что их окружает и создано для них</h1>
		<div class="header_main__logo">
			<a class="on-main" href="/"></a>
			<a href="#" title="На главную страницу"><img src="img/logo2-1.jpg" alt="KuklaStadt - сайт о куклах" width="320px" higth="100px"></a>
		</div><!-- ./header_main__logo -->
		<nav class="menu_main menu_main-closed menu_main-nojs">
			<button class="menu_main__toggle" type="button">Открыть меню</button>
			<div class="menu_main__wrapper">
				<ul class="menu_main__items">
					<li class="menu_main__item"><a>Главная</a></li>
					<li class="menu_main__item"><a href="">О нас</a></li>
					<li class="menu_main__item"><a href="">Гостевая книга</a></li>
					<li class="menu_main__item"><a href="">Карта сайта</a></li>
					<li class="menu_main__item menu_main__item-active"><a href="">Контакты</a></li>
					<li class="menu_main__item"><a href="">Новости</a></li>
					<li class="menu_main__user_item"><a href="" class="menu_main__user_login">Вход  / Регистрация</a>
					</li>
				</ul>
				<!-- <ul class="menu_main__user_items">
				</ul> -->
			</div><!-- menu_main__wrapper -->
		</nav>
	</header><!-- ./header_main -->
	<section class="search-banner">			
		<section class="search">				
			<form name="search" action="#" class="search-form" method="GET">
					<input type="search" class="search-form__input" placeholder="Поиск по сайту" required="">
					<button type="submit" class="search-form__btn" name="go"></button>
			</form>
		</section><!-- ./menu_main__search -->
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
				<article class="m-content__text">
<div class="user-default-login">
    <h1><?= Html::encode($this->title) ?></h1>
 
    <p><?= Module::t('module', 'PLEASE_FILL_FOR_LOGIN') ?></p>
 
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div style="color:#999;margin:1em 0">
                Если вы забыли свой пароль, вы можете <?= Html::a(Module::t('module', 'LINK_PASSWORD_RESET'), ['password-reset-request']) ?>.
            </div>
            <div class="form-group">
                <?= Html::submitButton(Module::t('module', 'USER_BUTTON_LOGIN'), ['class' => 'btn btn-primary', 'name' => 'login-button', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
				</article><!-- ./m-content__text -->
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
		<section class="m-all__m-sidebar m-sidebar m-sidebar__leftbar">
			<a  name="menu_cat"></a>
			<nav class="m-sidebar__menu menu-category">
				<header class="m-sidebar__header">
					<h2 class="m-sidebar__header-h2">Про кукол, для кукол</h2>
				</header>
        <ul class="menu-sidebar__items">
          <li class="menu-sidebar__item menu-sidebar__item_active"><a Href="/catalog.html">Декоративная кукла</a>
            <ul class="menu-sidebar__items">
            <li class="menu-sidebar__item"><a href="#">Интерьерная кукла</a></li>
            <li class="menu-sidebar__item"><a href="#">Ландшафтная кукла</a></li>
           </ul>
          </li>
          <li class="menu-sidebar__item"><a href="#">Тряпичная кукла</a>
            <ul class="menu-sidebar__items">
              <li class="menu-sidebar__item"><a href="#">Кукла оберег</a></li>
              <li class="menu-sidebar__item"><a href="#">Обрядовая кукла</a></li>
              <li class="menu-sidebar__item"><a href="#">Игровая кукла</a></li>
            </ul>
          </li>
          <li class="menu-sidebar__item"><a Href="#">Театральная кукла</a>
            <ul class="menu-sidebar__items">
              <li class="menu-sidebar__item"><a href="#">Марионетки</a></li>
            </ul>
          </li>
          <li class="menu-sidebar__item"><a Href="#">Куклы к праздникам, особенным мероприятиям</a></li>
          <li class="menu-sidebar__item"><a Href="#">Для кукол</a></li>
          <li class="menu-sidebar__item"><a Href="#">О куклах</a></li>
        </ul>
			</nav><!-- ./m-sidebar__menu-category -->
			<nav class="m-sidebar__menu menu-materials">
				<header class="m-sidebar__header">
					<h2 class="m-sidebar__header-h2">Из чего делают кукол?</h2>
				</header>
        <ul class="menu-sidebar__items">
            <li class="menu-sidebar__item menu-sidebar__item_active"><a href="#">Куклы из ткани</a></li>
            <li class="menu-sidebar__item"><a href="#">Куклы из шерсти - сухое валяние</a></li>
            <li class="menu-sidebar__item"><a href="#">Куклы из ниток</a></li>
            <li class="menu-sidebar__item"><a href="#">Прочие материалы</a></li>
     		 </ul>
			</nav><!-- ./m-sidebar__menu menu-materials -->
			<nav class="m-sidebar__menu">
				<header class="m-sidebar__header">
					<h2 class="m-sidebar__header-h2">Каталог статей</h2>
				</header>
				<ul class="menu-sidebar__items">
          <li class="menu-sidebar__item"><a href="#">Все статьи</a></li>
          <li class="menu-sidebar__item"><a href="#">Все статьи с мастер-классами</a></li>
        </ul>			
			</nav>
			<article class="m-sidebar__carousel">
					<header class="carousel__header">
						<h2 class="carousel__header_h2">
							Новые статьи о куклах:
						</h2>
					</header>
					<div class="fotorama" 
							data-width="100%"
							data-maxwidth="270px"			
							data-stopautoplayontouch="false"
							data-nav="thumbs">
					  <div data-img="/articles/images/kukla_obereg/bessonnica.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/77">Кукла Бессонница</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/den-noch.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла День-Ночь</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/den-noch2.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла День-Ночь (2)</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/filippovka.jpg">
					 	 <a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Филипповка</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/kapustka.jpg">
					 	 <a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Капустка</a>
					  </div>
				  </div>	
			</article><!-- ./m-sidebar__carousel -->
			<aside class="m-sidebar__menu">
				<header class="m-sidebar__header">
					<h2 class="m-sidebar__header-h2">Реклама</h2>
				</header>
				<div class="block_reklami-left">
					<a href="http://suharikisdegtem.ru/"><img src="/web/files/global/reclama/ks_280x460_igrovaja_v1.jpg" width="280" alt="Магазин подарков 'Сухарики с Дегтем'"></a>
				</div>
			</aside>	
			<aside class="m-sidebar__menu">
						<header class="m-sidebar__header">
							<h2 class="m-sidebar__header-h2">Реклама</h2>
						</header>
						<div class="block_reklami-left">
							<a href="http://suharikisdegtem.ru/"><img src="/web/files/global/reclama/ks_280x460_obrjadovaja_v2.jpg" width="280" alt="Магазин подарков 'Сухарики с Дегтем'"></a>
						</div>
					</aside>	
			<aside class="m-sidebar__menu list-counter">
				<div class="list-counter__wrapper">
				<header class="m-sidebar__header">
					<h2 class="m-sidebar__header-h2">Метрика сайта KuklaStadt</h2>
				</header>
					<div id="ratingMail" class="ratingMail">
						  <!-- Rating@Mail.ru logo -->
						    <a href="http://top.mail.ru/jump?from=2516756">
						    <img src="//top-fwz1.mail.ru/counter?id=2516756;t=326;l=1" 
						    style="border:0;" height="18" width="88" alt="Рейтинг@Mail.ru" /></a>
						  <!-- //Rating@Mail.ru logo -->
						  </div>
						  <div id="counter_LiveInternet">
						    <!--LiveInternet logo--><a href="//www.liveinternet.ru/click"
						    target="_blank"><img src="//counter.yadro.ru/logo?24.3"
						    title="LiveInternet: показано число посетителей за сегодня"
						    alt="" border="0" width="88" height="15"/></a><!--/LiveInternet-->
						  </div>
						  <div id="counter_rambler">
							  <!-- Top100 (Kraken) Widget -->
						    <div id="top100_widget"></div>
							  <!-- END Top100 (Kraken) Widget -->
							  <!-- Top100 (Kraken) Counter -->
						    <script>
						    (function (w, d, c) {
						    (w[c] = w[c] || []).push(function() {
						    var options = {
						    project: 3021379,
						    element: 'top100_widget'
						    };
						    try {
						    w.top100Counter = new top100(options);
						    } catch(e) { }
						    });
						    var n = d.getElementsByTagName("script")[0],
						    s = d.createElement("script"),
						    f = function () { n.parentNode.insertBefore(s, n); };
						    s.type = "text/javascript";
						    s.async = true;
						    s.src =
						    (d.location.protocol == "https:" ? "https:" : "http:") +
						    "//st.top100.ru/top100/top100.js";
						    
						    if (w.opera == "[object Opera]") {
						    d.addEventListener("DOMContentLoaded", f, false);
						    } else { f(); }
						    })(window, document, "_top100q");
						    </script>
						    <noscript><img src="//counter.rambler.ru/top100.cnt?pid=3021379"></noscript>
						   <!-- END Top100 (Kraken) Counter -->
						  </div>	
					  </div>	
			</aside>
		</section><!-- ./m-all__m-sidebar m-sidebar__leftbar -->
	</section><!-- /.m-all -->