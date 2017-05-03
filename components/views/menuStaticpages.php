<?php 
// debug(Yii::$app->request->get());
use yii\helpers\Url;
?>
<?php if ($staticPages): ?>

	<?php if(!Yii::$app->request->get('id')): ?>
		<li class="menu_main__item menu_main__item-active"><a>Главная</a></li>	
	<?php endif; ?>	
		

	<?php foreach ($staticPages as $page): ?>
		<li class="menu_main__item 
				<?php if(Yii::$app->request->get('id') === $page['link']): ?>
				menu_main__item-active
				<?php endif; ?>
				">
			<a href="<?= Url::to(['staticpages/'.$page['link'], 'id' => $page['link']])?>">
				<?= $page['title'] ?>
			</a>
		</li>
	<?php endforeach; ?>
<?php endif; ?>

