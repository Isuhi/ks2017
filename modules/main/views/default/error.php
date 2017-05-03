<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

use app\modules\main\Module;
use yii\widgets\Breadcrumbs;


$this->title = Module::t('module', 'TITLE_ERROR');
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
		<div class="main-default-error">
			<h1><?= Html::encode($this->title) ?></h1>
			<div class="alert alert-danger">
					<?= nl2br(Html::encode($message)) ?>
			</div>
		</div>
		<article class="article-text">
			<p>Когда-то, давным-давно, 200000 лет назад здесь жили самые настоящие марсианские куклы. Но однажды им стало скучно  - ведь земных кукол тогда еще не было, и они улетели жить на другую планету. </p>
			<p>Конечно, не все инопланетные гости нас покинули. Осталось несколько внеземных жутиков со жгутиками, которым пришлась по душе земная атмосфера с ее обитателями. Они так и живут среди нас, периодически пытаясь познакомиться с кем-нибудь из местных жителей поближе. </p>
			<p>Но манеры общения у них весьма непривычные - непонятно, вдруг они есть хотят, а не общаться? Поэтому в таких непонятных ситуациях лучше всего спрятаться. А чтобы уж наверняка все поверили в то, что тут нет никого - стало принято показывать цифры "404", которые даже на инопланетных языках означают одно и тоже - "кина не будет", "все пропало", "ушла на базу", "оставь меня, старушка - я в печали", "все уже украдено до нас", в общем - "Барбамбия! Кергуду!"  </p>		
			<p>Но я на всякий случай сохранил это место для внеземных кукол - вдруг они когда-нибудь вернутся...</p>
			<figure class="article-figure">
				<?= HTML::img('/web/files/global/staticpages/404.gif', ['alt' => 'Ошибочка вышла', 'title' => 'Ошибочка вышла']) ?>
				<figcaption class="article-figcaption">Смекалка и сноровка - залог долгой и благополучной жизни в любых условиях. </figcaption>
			</figure>
			<p>И еще - иногда случается ошибка при ручном наборе адреса страницы, или его копировании и вставки в адресную строку. Воспользуйтесь меню категорий для перехода на работающие страницы или перейдите на <a href="<?= Url::home()?>">главную страницу сайта KuklaSatadt</a>.</p>
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