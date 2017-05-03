<?php

/* @var $this yii\web\View */
use app\components\widgets\Alert;
use app\modules\user\Module;


$this->title = Yii::$app->name;

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
				<article class="m-content__text">
    <?= Alert::widget() ?>
<?php //debug($model); ?>
					<header class="text-header">
						<h2 class="text-header__h2-welcome">
							<?php if(!Yii::$app->user->isGuest) :?>
							<?php // debug($model);?>
							Здравствуйте, <?= $model->username ?>!
							<?php else:?>
							Здравствуйте, уважаемые посетители сайта "KuklaStadt"!</h2>
						<?php endif;?>
		        <h1 class="text-header__h1">KuklaStadt  - сайт о куклах, про кукол и о том, что есть для кукол</h1>
					</header><!-- ./text-header -->
					<p>Мы приветствуем вас на главной странице нашего проекта, который целиком и полностью посвящен куклам и всему, что с ними связано. На страницах сайта будет размещаться много интересной информации о куклах, их появлении и их жизни. Мы постараемся рассказать о куклах все - от технологий изготовления и разнообразия кукол до особенностей их характера и капризов.</p>
		      <p>Все материалы сайта разделены по двум главным критериям - из чего сделана кукла и для чего она появилась на свет. Поэтому слева вы видите два меню, пункты которых говорят сами за себя. Единственное уточнение - статьи на сайте могут быть информационными и практическими, наподобие мастер-классов. В пунктах меню, думаю, разберетесь сами.</p>
		      <p>Получить основную информацию о нашем проекте вы можете, посетив странички, ссылки на которые находятся в верхнем меню в шапке сайта. И еще. Хочу вас познакомить с самым первым жителем нашего города - маленькой девочкой Веселиной:</p>
		      <figure class="m-content__figure">
		        <img src="/web/img/Veselina.png" alt="Веселина - главный экскурсовод города KuklaStadt" title="Веселина - главный экскурсовод города KuklaStadt">
		        <figcaption class="m-content__figcaption"> «Всем привет! Мне тут надо сбегать кое-куда, так что вы пока погуляйте по нашим страничкам, а я потом прибегу и все-все вам расскажу» </figcaption>
		      </figure>
		      <p>Она получилась уж очень любопытной и общительной куклой. К тому же, как любой нормальный маленький ребенок, Веселина так и норовит куда-нибудь залезть и кого-нибудь там найти.</p>
		      <p>Можно было, конечно, спрятать ее в чулан, но стать Карабасами-Барабасами у нас не получилось. Поэтому на общем собрании было принято решение утвердить Веселину на должность главного экскурсовода кукольного города KuklaStadt. И пока мы готовим новые материалы для сайта, она вас будет сопровождать, подсказывать, а иногда, чует моя душа – и сама рассказывать истории о кукольной жизни.</p>
		      <p>На этом прощаемся, желаем вам приятного времяпровождения в самом кукольном из всех городов – KuklaStadt!</p>
		      <p>
		      PS. Если у кого-нибудь возникнет желание использовать материалы сайта KuklaStad на своих ресурсах, то на странице "
		      <a target="_blank" href="http://kuklastadt.ru/contacts" title="Напишите нам письмо">Контакты</a>
		      " есть вся необходимая информация об этом.
		      </p>
				</article><!-- ./m-content__text -->
				<aside class="m-content__banner m-content__banner-middle">
					<div class="banner_c_c banner_728x90"> 
						<a href="https://mchost.ru/?referer=4180319423" target=_blank><img src="//ban.mchost.ru/b/728x90.jpg" width="728" height="90" border="0" alt="Хостинг от Макхост" /></a>
					</div>
				</aside><!-- ./m-content__banner m-content__banner-middle -->
				<article class="m-content__new-article">
	        <header class="new-article__header">
		        	<h2 class="new-article__header_h2">Новая статья на сайте</h2>
		          <h3 class="new-article__header_h3"><a href="/article.html">Кукла Мишка, кукла Машка</a></h3>
	        </header>
	        <figure class="new-article__img">
	         <a href="/article.html"><img src="articles/images/mischka_maschka_34.jpg" alt="Кукла Мишка, кукла Машка"></a>
	        </figure>
	        <p class="new-article__p">Кукла Мишка, кукла Машка - это интерьерные куклы Анжелины Дегтяревой из ее новой коллекции под названием «Мультиваляшки».Кукла Мишка, кукла Машка - это интерьерные куклы Анжелины Дегтяревой из ее новой коллекции под названием «Мультиваляшки».Кукла Мишка, кукла Машка - это интерьерные куклы Анжелины Дегтяревой из ее новой коллекции под названием «Мультиваляшки».Кукла Мишка, кукла Машка - это интерьерные куклы Анжелины Дегтяревой из ее новой коллекции под названием «Мультиваляшки».</p>
	        <aside class="new-article__details">
	        	<p class="new-article__date">Дата: 28.08.2016</p>
	          <p class="new-article__link-more">
	            <a href="/article.html">Читать статью</a>
	          </p>
	        </aside>	
				</article><!-- ./m-content__new-article -->
				<aside class="m-content__banner m-content__banner-middle">
					<div class="banner_c_c banner_728x90"> 
						<a href="https://mchost.ru/?referer=4180319423" target=_blank><img src="//ban.mchost.ru/b/728x90.jpg" width="728" height="90" border="0" alt="Хостинг от Макхост" /></a>
					</div>
				</aside><!-- ./m-content__banner m-content__banner-middle -->
				<article class="m-content__carousel">
					<header class="carousel__header">
						<h2 class="carousel__header_h2">
							Несколько случайных статей, опубликованых на сайте:
						</h2>
					</header>
					<div class="fotorama" 
							data-width="100%"
							data-maxwidth="500px"			
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
					  <div data-img="/articles/images/kukla_obereg/koljada.jpg">
					  <a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Коляда</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/kolokolchik.jpg">
					 	 <a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Колокольчик</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/kormilka.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Кормилка</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/kosma_demian.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Козьма и Демьян</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/krupenichka.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Крупеничка</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/kubishka-travnica.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Кубышка-Травница</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/kukla_dolja2.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Доля</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/lihomanki.jpg">
					 	 <a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Лихоманки</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/maslenica.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Масленница</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/metlushka.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Метлушка</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/mirovoe_derevo.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Мировое Дерево</a>
					  </div>
					  <div data-img="/articles/images/kukla_obereg/motanka.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Мотанка</a>
					  	</div>
					  <div data-img="/articles/images/kukla_obereg/nerazluchniki.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Неразлучники</a>
					  	</div>
					  <div data-img="/articles/images/kukla_obereg/paraskeva.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Параскева</a>
					  	</div>
					  <div data-img="/articles/images/kukla_obereg/pelenashka.jpg">
					  	<a class="link__fotorama"  href="http://kuklastadt.ru/articles/id/78">Кукла Пеленашка</a>
				  	</div>
					</div>
				</article><!-- ./m-content__carousel -->
									<div class="article-end">
						<p>. . . . .</p>
						<p>На этом все</p>
						<p>До следующих встреч на страницах сайта KuklaStadt!</p>
					</div><!-- /.article-end -->
		<aside class="social-seti">
			<p>Вы можете поделиться своим мнением об этой странице со всеми друзьями и знакомыми в социальных сетях:</p>
			<div class="ya-share2 social-buttons" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,lj"></div>
		</aside>
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
		