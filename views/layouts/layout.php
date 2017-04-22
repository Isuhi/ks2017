<?php
 
use yii\helpers\Html;
use app\assets\AppAsset;
 
/* @var $this \yii\web\View */
/* @var $content string */
 
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
		<link rel="shortcut icon" href="/web/favicon.ico" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="body-ks">
 
<?php $this->beginBody() ?>
   
        <?= $content ?>

 
	<footer class="m-footer">
		<nav class="footer__block footer__nav">
				<div class="footer-nav__item"><a href="#">К началу страницы</a></div>
				<div class="footer-nav__item"><a href="#menu_cat">К меню категорий</a></div>
		</nav>
		<div class="footer__block footer__copy">
			<img src="/img/fav_30.png" alt="">
			<p class="footer__copy-p">&copy; <a href="#">KuklaStadt</a> 2014-2017</p>
			<img src="/img/fav_30.png" alt="">
		</div>
	</footer><!-- ./m-footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

