<?php

use yii\helpers\Html;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Comments */

$this->title = Module::t('module', 'UPDATE'). ' :' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'COMMENTS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('module', 'UPDATE');
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
