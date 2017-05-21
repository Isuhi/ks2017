<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\user\Module;
use yii\widgets\Breadcrumbs;
use app\components\widgets\Alert;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Module::t('module', 'TITLE_PROFILE');
$this->params['breadcrumbs'][] = $this->title;

$this->params['breadcrumbs'][] = $model->username;
?>
		<aside class="search-banner__banner">
			<div class="search-banner__banner-wrap"> 
				<?=  Html::a(Html::img('/web/files/global/reclama/ks_500x50_valjanaja_v2.jpg',	['width' => 500,'height' => 50,	'alt' => 'Валяные куклы и игрушки на сайте KuklaStadt'	]),	'/type/kukly-svalyanye-iz-shersti', ['alt' => 'Все валяные куклы и игрушки',	'title' => 'Все валяные куклы и игрушки'])?>
			</div>
		</aside><!-- ./search-banner__banner -->
		<aside class="search-banner__banner">
			<div class="search-banner__banner-wrap"> 
				<?=  Html::a(Html::img('/web/files/global/reclama/ks_500x50_narodnaja_v3.jpg', ['width' => 500, 'height' => 50, 'alt' => 'Народные тряпичные куклы на сайте KuklaStadt']), '/category/tryapichnaya-kukla', ['alt' => 'Все тряпичные народные куклы','title' => 'Все тряпичные народные куклы'])?>
			</div>
		</aside><!-- ./search-banner__banner -->
	</section>
	<section class="m-all">
		<section class="m-all__m-content">
			<div class="m-content__wrapper">
				<article class="m-content__text">
		<?php echo Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?php  echo Alert::widget() ?>
					
<div class="user-profile">
 
    <h1><?= Html::encode($this->title) . ': ' . $model->username?></h1>
		<p>
        <?= Html::a(Module::t('module', 'BUTTON_UPDATE'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'LINK_PASSWORD_CHANGE'), ['password-change'], ['class' => 'btn btn-primary']) ?>
    </p>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
        ],
    ]) ?>
 
</div>
					
</article><!-- ./m-content__text -->

			</div>
				<section class="m-all__m-sidebar m-sidebar m-sidebar__rightbar">
					<aside class="m-sidebar__reklama">
						<div class="block_reklami-right">
							<?=  Html::a(Html::img('/web/files/global/reclama/ks_240x400_mc.gif', ['alt' => 'Мастер-классы кукол на сайте KuklaStadt']), '/master-classes', ['alt' => 'Мастер-классы кукол на сайте KuklaStadt','title' => 'Мастер-классы кукол на сайте KuklaStadt'])?>
						</div>
					</aside>
					<aside class="m-sidebar__reklama">
						<div class="block_reklami-right">
							<?=  Html::a(Html::img('/web/files/global/reclama/ks_240x400_val.gif', ['alt' => 'Валяные игрушки на сайте KuklaStadt']), '/type/kukly-svalyanye-iz-shersti', ['alt' => 'Валяные игрушки на сайте KuklaStadt','title' => 'Валяные игрушки на сайте KuklaStadt'])?>
						</div><!-- /.m-content__wrapper -->
					</aside>
				</section><!-- ./m-all__m-sidebar m-sidebar__rightbar -->
		</section><!-- /.m-all__m-content -->