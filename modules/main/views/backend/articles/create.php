<?php

use yii\helpers\Html;
use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Articles */

$this->title = Module::t('module', 'ARTICLES_CREATE');
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ARTICLES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
