<?php use yii\helpers\Url; ?>
<?php if($randArticles): ?>
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
	<?php foreach ($randArticles as $randArticle): ?>
	<div data-img="/web/files/global/maxi/<?= $randArticle->img ?>">
			<a class="link__fotorama"  href="<?= Url::to(['articles/view', 'alias' => $randArticle->alias]) ?>"><?= $randArticle->title ?></a>
		</div>
	<?php endforeach; ?>
</div>
</article><!-- ./m-content__carousel -->
<?php endif;?>

