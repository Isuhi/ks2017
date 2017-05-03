<?php 
// debug($newArticles);
use yii\helpers\Url;
?>
<?php if($newArticles): ?>
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
	<?php foreach ($newArticles as $newArticle): ?>
		<div data-img="/web/files/global/maxi/<?= $newArticle->img ?>">
			<a class="link__fotorama"  href="<?= Url::to(['articles/view', 'alias' => $newArticle->alias]) ?>"><?= $newArticle->title ?></a>
		</div>
	<?php endforeach; ?>
	</div>	
</article><!-- ./m-sidebar__carousel -->
<?php endif;?>

