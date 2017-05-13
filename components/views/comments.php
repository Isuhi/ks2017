<?php
//debug($comments);
?>
<li class="comments__item ">
	<div class="comment__item 
			 <?php if ($comments['role'] === 'guest'): ?>
				comment__item_guest
			 <?php elseif ($comments['role'] === 'user'): ?>
				comment__item_user
			 <?php elseif ($comments['role'] === 'admin'): ?>
				comment__item_admin
			 <?php endif; ?>
			 " data-id="<?= $comments['id'] ?>">
		<div class="comment__data">
			<p class="comment__login"><span class="glyphicon
				<?php if ($comments['role'] === 'guest'): ?>
				glyphicon-user
			 <?php elseif ($comments['role'] === 'user'): ?>
				glyphicon-star-empty
			 <?php elseif ($comments['role'] === 'admin'): ?>
				glyphicon-cog
			 <?php endif; ?>															
				">
				</span> <?= $comments['username'] ?></p>
			<p class="comment__date"><?= Yii::$app->formatter->asDate($comments['created_at'], 'dd.MM.yyyy - H:i:s'); ?></p>
		</div>
		<div class="comment__text">
			<?= $comments['text'] ?>
		</div>
		<p class="comment__link"><a href="#comment-form"> Ответить</a></p>
	</div>
	<?php if( isset($comments['childs']) ): ?>
	<ul class="comments__items">
		<?= $this->getMenuHtml($comments['childs']); ?>
	</ul>	
	<?php endif;?>
</li>


<!--<ul class="comments__items">
	<li class="comments__item ">
		<div class="comment__item comment__item_user">
			<div class="comment__data">
				<p class="comment__login"><span class="glyphicon glyphicon-star-empty"></span> Имя посетителя<span> &rarr; &rarr; &rarr;  Имя гостя</span></p>

				<p class="comment__date">20.05.2017г.</p>
			</div>
			<div class="comment__text">
				<p>Текст комментария, который оставил зарегистрированный и aвторизованный посетитель в ответ на комментарий гостя</p>
			</div>
			<p class="comment__link"><a href=""> Ответить</a></p>
		</div>
	</li>
</ul>
<ul class="comments__items">
	<li class="comments__item ">
		<div class="comment__item comment__item_admin">
			<div class="comment__data">
				<p class="comment__login"><span class="glyphicon glyphicon-cog"></span> Имя администратора <span> &rarr; &rarr; &rarr;  Имя посетителя</span></p>

				<p class="comment__date">20.05.2017г.</p>
			</div>
			<div class="comment__text">
				<p>Текст комментария, который оставил администратор в ответ на ответ постоянного посетителя гостю.</p>
			</div>
			<p class="comment__link"><a href=""> Ответить</a></p>
		</div>
	</li>
</ul>-->
