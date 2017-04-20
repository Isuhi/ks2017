<?php

use yii\helpers\Html;
use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Types */

$this->title = Module::t('module', 'UPDATE_TYPES') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_TYPE'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('module', 'UPDATE');
?>
<div class="types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
