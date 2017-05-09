<?php
//debug($data);
?>

<li class="menu-sidebar__item menu-sidebar__item_active">
	<a href="
	<?= yii\helpers\Url::to(['catalog/category', 'alias' => $categories['alias']]) ?>">
	<?= $categories['name'] ?></a>
	<?php if( isset($categories['childs']) ): ?>
		<ul class="menu-sidebar__items">
			<?= $this->getMenuHtml($categories['childs']); ?>
		</ul>
	<?php endif; ?>
</li>      
