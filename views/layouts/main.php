<?php
 
use app\components\widgets\Alert;
use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\components\MenuCategoriesWidget;
use app\components\MenuTypesWidget;
use app\components\SliderNewWidget;
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\main\models\backend\Staticpages;

 
/* @var $this \yii\web\View */
/* @var $content string */
 
?>
<?php $this->beginContent('@app/views/layouts/layout.php'); ?>
<header class="header_main">
		<h1 class="visually-hidden">KuklaStadt - сайт о куклах, об истории кукол, о жизни кукол, обо всем, что их окружает и создано для них</h1>
<?php
NavBar::begin([
    'brandLabel' => 'KuklaStadt - сайт о куклах',
/*    'brandLabel' => Yii::$app->name,*/

/*   'brandLabel' => '<img src="/web/img/fav_30.png" alt="На  главную страницу" title="На  главную страницу">',*/
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'activateParents' => true,
//    'items' => Staticpages::topMenu(),
    'items' => array_filter([
		 
//        ['label' => Yii::t('app', 'NAV_HOME'), 
//						'url' => ['/main/default/index'],
//				],
        ['label' => Yii::t('app', 'NAV_NEWS'), 
						'url' => ['/main/default/news'],
				],
        ['label' => Yii::t('app', 'NAV_MAP'), 
						'url' => ['/main/default/map'],
				],
        ['label' => Yii::t('app', 'NAV_ABOUT'), 
						'url' => ['/main/default/about'],
				],
        ['label' => Yii::t('app', 'NAV_GUEST'), 
						'url' => ['/main/default/guestbook'],
				],
        ['label' => Yii::t('app', 'NAV_CONTACT'), 
						'url' => ['/main/contact/index']
				],
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_SIGNUP'), 'url' => ['/user/default/signup']] :
            false,
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login']] :
            false,
        Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL) ?
            ['label' => Yii::t('app', 'NAV_ADMIN'), 'url' => ['/admin/default/index']] :
            false,
        !Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'NAV_PROFILE'), 'items' => [
                ['label' => Yii::t('app', 'NAV_PROFILE'), 'url' => ['/user/profile/index']],
                ['label' => Yii::t('app', 'NAV_LOGOUT'),
                    'url' => ['/user/default/logout'],
                    'linkOptions' => ['data-method' => 'post']]
            ]] :
            false,
			]),

		]);

    NavBar::end();
?>
		<div class="header_main__logo">
			<a class="on-main" href="/"></a>
			<a href="/" title="На главную страницу"><img src="/web/img/logo4.png" alt="KuklaStadt - сайт о куклах" ></a>
		</div><!-- ./header_main__logo -->
</header><!-- ./header_main -->
	<section class="search-banner">			
		<section class="search">				
			<form name="search" action="<?= Url::to(['catalog/search']) ?>" class="search-form" method="get">
					<input type="search" class="search-form__input" placeholder="Поиск по сайту" name="search" required="">
					<button type="submit" class="search-form__btn"></button>
			</form>
		</section><!-- ./menu_main__search -->
		
    <?= $content ?>

<section class="m-all__m-sidebar m-sidebar m-sidebar__leftbar">
	<a  name="menu_cat"></a>
	<nav class="m-sidebar__menu menu-category">
		<header class="m-sidebar__header">
			<h2 class="m-sidebar__header-h2">Про кукол, для кукол</h2>
		</header>
		<ul class="menu-sidebar__items">
			<?= MenuCategoriesWidget::widget(); ?>
		</ul>
	</nav><!-- ./m-sidebar__menu-category -->
	<nav class="m-sidebar__menu menu-materials">
		<header class="m-sidebar__header">
			<h2 class="m-sidebar__header-h2">Из чего делают кукол?</h2>
		</header>
		<ul class="menu-sidebar__items">
			<?= MenuTypesWidget::widget(); ?>
		 </ul>
	</nav><!-- ./m-sidebar__menu menu-materials -->
	<nav class="m-sidebar__menu">
		<header class="m-sidebar__header">
			<h2 class="m-sidebar__header-h2">Каталог статей</h2>
		</header>
		<ul class="menu-sidebar__items">
			<li class="menu-sidebar__item">
				<a href="<?= Url::to(['catalog/all-articles']) ?>">Все статьи сайта</a>
			</li>
			<li class="menu-sidebar__item">
				<a href="<?= Url::to(['catalog/master-classes']) ?>">Все статьи с мастер-классами</a>
			</li>
		</ul>			
	</nav>
	<?= SliderNewWidget::widget(); ?>
	<aside class="m-sidebar__menu">
		<header class="m-sidebar__header">
			<h2 class="m-sidebar__header-h2">Реклама</h2>
		</header>
		<div class="block_reklami-left">
			<?=  Html::a(Html::img('/web/files/global/reclama/ks_280x460_igrovaja_v1.jpg', ['alt' => 'Игровые куклы на сайте KuklaStadt']), '/category/igrovaya-kukla', ['alt' => 'Игровые куклы на сайте KuklaStadt','title' => 'Игровые куклы на сайте KuklaStadt'])?>
		</div>
	</aside>	
	<aside class="m-sidebar__menu">
		<header class="m-sidebar__header">
			<h2 class="m-sidebar__header-h2">Реклама</h2>
		</header>
		<div class="block_reklami-left">
			<?=  Html::a(Html::img('/web/files/global/reclama/ks_280x460_obrjadovaja_v2.jpg', ['alt' => 'Обрядовые куклы на сайте KuklaStadt']), '/category/obryadovaya-kukla', ['alt' => 'Обрядовые куклы на сайте KuklaStadt','title' => 'Обрядовые куклы на сайте KuklaStadt'])?>
		</div>
	</aside>
	<aside class="m-sidebar__menu m-sidebar__menu-grow">
		<header class="m-sidebar__header">
			<h2 class="m-sidebar__header-h2">А здесь будет что-то оччень интересное!</h2>
			<p>Но потом...</p>
		</header>
	</aside>
			<aside class="m-sidebar__menu list-counter">
				<div class="list-counter__wrapper">
				<header class="m-sidebar__header">
					<h2 class="m-sidebar__header-h2">Метрика сайта KuklaStadt</h2>
				</header>
					<div id="ratingMail" class="ratingMail">
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "2516756", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div>
<img src="//top-fwz1.mail.ru/counter?id=2516756;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->

<!-- Rating@Mail.ru logo -->
<a href="http://top.mail.ru/jump?from=2516756">
<img src="//top-fwz1.mail.ru/counter?id=2516756;t=326;l=1" 
style="border:0;" height="18" width="88" alt="Рейтинг@Mail.ru" /></a>
<!-- //Rating@Mail.ru logo -->
						  </div>
						  <div id="counter_LiveInternet">
						    <!--LiveInternet counter-->
								<script type="text/javascript">
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t24.2;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число посетителей за"+
" сегодня' "+
"border='0' width='88' height='15'><\/a>")
</script><!--/LiveInternet-->
						  </div>
						  <div id="counter_rambler">
							  <!-- Top100 (Kraken) Widget -->
						    <div id="top100_widget"></div>
							  <!-- END Top100 (Kraken) Widget -->
							  <!-- Top100 (Kraken) Counter -->
						    <script>
						    (function (w, d, c) {
						    (w[c] = w[c] || []).push(function() {
						    var options = {
						    project: 3021379,
						    element: 'top100_widget'
						    };
						    try {
						    w.top100Counter = new top100(options);
						    } catch(e) { }
						    });
						    var n = d.getElementsByTagName("script")[0],
						    s = d.createElement("script"),
						    f = function () { n.parentNode.insertBefore(s, n); };
						    s.type = "text/javascript";
						    s.async = true;
						    s.src =
						    (d.location.protocol == "https:" ? "https:" : "http:") +
						    "//st.top100.ru/top100/top100.js";
						    
						    if (w.opera == "[object Opera]") {
						    d.addEventListener("DOMContentLoaded", f, false);
						    } else { f(); }
						    })(window, document, "_top100q");
						    </script>
						    <noscript><img src="//counter.rambler.ru/top100.cnt?pid=3021379"></noscript>
						   <!-- END Top100 (Kraken) Counter -->
						  </div>	
					  </div>	
			</aside>
		</section><!-- ./m-all__m-sidebar m-sidebar__leftbar -->
	</section><!-- /.m-all -->
 
<?php $this->endContent(); ?>