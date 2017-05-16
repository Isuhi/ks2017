<?php
//debug($comments);
use app\components\CommentsWidget;
use yii\helpers\HtmlPurifier;
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
			 " id="comment_<?= $comments['id'] ?>"
	>
		<div class="comment__data">
			<p class="comment__login">
				<span class="glyphicon
					<?php if ($comments['role'] === 'guest'): ?>
					glyphicon-asterisk
				 <?php elseif ($comments['role'] === 'user'): ?>
					glyphicon-star-empty
				 <?php elseif ($comments['role'] === 'admin'): ?>
					glyphicon-cog
				 <?php endif; ?>															
				">
				</span> 
					<?= $comments['username'] ?>
					<?php if( isset($comments['parent_id']) ): ?>
					<span> &rarr; &rarr; &rarr;  <?= $comments['parent']['username'] ?> </span>
					<?php endif;?>
			</p>
			<p class="comment__date"><?= Yii::$app->formatter->asDate($comments['created_at'], 'dd.MM.yyyy'."г.".' - H:i'); ?></p>
		</div><!-- /.comments__data-->
		<div class="comment__text">
<?php if ($comments['visible']): ?>
			
<?php echo HtmlPurifier::process($comments['text']); ?>	
			<?php //= $comments['text'] ?>
		
<?php else: ?>
<p>Комментарий скрыт администратором.</p>
<?php endif; ?>
		</div><!-- /.comments__text-->
		<p class="comment__link"><a class="reply" data-id="<?= $comments['id'] ?>" > Ответить</a></p>
	</div><!-- /.comment__item-->
	<?php if( isset($comments['childs']) ): ?>
	<ul class="comments__items">
		<?= $this->getMenuHtml($comments['childs']); ?>
	</ul><!-- /.comments__items-->	
	<?php endif;?>
</li><!-- /.comments__item-->


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
