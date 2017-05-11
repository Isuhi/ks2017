<?php

/* @var $this yii\web\View */
use app\components\widgets\Alert;
use app\modules\user\Module;
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\SliderRundWidget;


//$this->title = Yii::$app->name;

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
					<div class="text_main">
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
					</div>
				</article><!-- ./m-content__text -->
				<aside class="m-content__banner m-content__banner-middle">
					<div class="banner_c_c banner_728x90"> 
						<a href="https://mchost.ru/?referer=4180319423" target=_blank><img src="//ban.mchost.ru/b/728x90.jpg" width="728" height="90" border="0" alt="Хостинг от Макхост" /></a>
					</div>
				</aside><!-- ./m-content__banner m-content__banner-middle -->
<?php // debug($newArticle)?>
			<?php if(!empty($newArticle)):?>
				<?php // foreach($newArticle as $dataArticle): ?>
				<article class="m-content__new-article">
	        <header class="new-article__header">
		        	<h2 class="new-article__header_h2">Новая статья на сайте</h2>
		          <h3 class="new-article__header_h3"><a href="<?= Url::to(['articles/view', 'alias' => $newArticle->alias]) ?>"><?= $newArticle->title ?></a></h3>
	        </header>
	        <figure class="new-article__img">
	         <a href="<?= Url::to(['articles/view', 'alias' => $newArticle->alias]) ?>">
							<?= Html::img("/web/files/global/maxi/{$newArticle->img}", ['alt' => $newArticle->title, 'title' => $newArticle->title]) ?>
						</a>
	        </figure>
	        <p class="new-article__p"><?= $newArticle->anons ?></p>
	        <aside class="new-article__details">
	        	<p class="new-article__date">Дата: <?= Yii::$app->formatter->asDate($newArticle->created_at, 'dd.MM.yyyy');?> г.</p>
	          <p class="new-article__link-more">
	            <a href="<?= Url::to(['articles/view', 'alias' => $newArticle->alias]) ?>">Читать статью</a>
	          </p>
	        </aside>	
				</article><!-- ./m-content__new-article -->
				<?php // endforeach; ?>
			<?php endif;?>
				<aside class="m-content__banner m-content__banner-middle">
					<div class="banner_c_c banner_728x90"> 
						<a href="https://mchost.ru/?referer=4180319423" target=_blank><img src="//ban.mchost.ru/b/728x90.jpg" width="728" height="90" border="0" alt="Хостинг от Макхост" /></a>
					</div>
				</aside><!-- ./m-content__banner m-content__banner-middle -->
				<?= SliderRundWidget::widget()?>
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
		