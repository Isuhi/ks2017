<?php
 
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
 
/* @var $this \yii\web\View */
/* @var $content string */
 
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
		<!--<link rel="shortcut icon" href="/web/favicon.ico" type="image/x-icon">-->
		<?php $this->registerLinkTag(['rel' => 'shortcut icon', 'type' => 'image/x-icon', 'href' => Url::to(['/web/favicon.ico'])]); ?>
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
			<img src="/web/img/fav_30.png" alt="">
			<p class="footer__copy-p">&copy; <a href="#">KuklaStadt</a> 2014-<?=date('Y')?></p>
			<img src="/web/img/fav_30.png" alt="">
		</div>
</footer><!--	 ./m-footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

