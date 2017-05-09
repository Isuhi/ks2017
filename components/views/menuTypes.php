<li class="menu-sidebar__item menu-sidebar__item_active">
	<a href="
	<?= yii\helpers\Url::to(['catalog/type', 'alias' => $types['alias']]) ?>">
	<?= $types['name'] ?></a>
	<?php if( isset($types['childs']) ): ?>
		<ul class="menu-sidebar__items">
			<?= $this->getMenuHtml($types['childs']); ?>
		</ul>
	<?php endif; ?>
</li>  

