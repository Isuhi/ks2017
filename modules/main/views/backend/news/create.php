<?php

use yii\helpers\Html;
use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\News */

$this->title = Module::t('module', 'NEWS_CREATE');
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'NEWS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
