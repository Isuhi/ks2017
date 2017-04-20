<?php

use yii\helpers\Html;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */

$this->title = Module::t('module', 'ADMIN_UPDATE_CATEGORIES'). ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_CATEGORIES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('module', 'ADMIN_UPDATE');
?>
<div class="categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
