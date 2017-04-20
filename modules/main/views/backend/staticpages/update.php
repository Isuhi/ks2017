<?php

use yii\helpers\Html;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Staticpages */

$this->title = Module::t('module', 'UPDATE') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'STATICPAGES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('module', 'UPDATE');
?>
<div class="staticpages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
