<?php
use yii\helpers\Html;
use app\components\widgets\Alert;
use app\modules\user\Module;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;


if( $categoriesParent ):
	$this->params['breadcrumbs'][] = [
												'label' => $categoriesParent->name,
												'url' => ['catalog/category', 'alias' => $categoriesParent['alias']]
											];	
endif;
$this->params['breadcrumbs'][] = [
												'label' => $articles->categories->name,
												'url' => ['catalog/category', 'alias' => $articles->categories->alias]
											];	
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
				<article class="article-text">
				<header class="text-header">
					<h1 class="text-header__h1"><?= $articles -> title ?></h1>
				</header><!-- ./text-header -->
				<aside class="article-data">
					<ul class="article-data__items">
						<li class="article-data__item">
							Статья из категории материалов: <a href="<?= Url::to(['catalog/type', 'alias' => $articles->type->alias]) ?>"><?= $articles->type->name ?></a>
						</li>
						<li class="article-data__item">Дата публикации: <?= Yii::$app->formatter->asDate($articles->created_at, 'dd-MM-yyyy');?> г.</li>
						<?php if($articles->created_at < $articles->updated_at): ?>
						<li class="article-data__item">Дата обновления: <?= Yii::$app->formatter->asDate($articles->updated_at, 'dd-MM-yyyy');?> г.</li>
						<?php endif; ?>
						<li class="article-data__item">Автор статьи: <?= $articles -> author ?></li>
						<li class="article-data__item">Количество просмотров: <?= $articles -> view ?></li>
					</ul>
				</aside>
				<header class="text-header">
					<h3 class="text-header__h3-welcome">Здравствуйте, уважаемые посетители сайта "KuklaStadt"!</h3>
				</header><!-- ./text-header -->
				<?= $articles->text ?>		
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
		
