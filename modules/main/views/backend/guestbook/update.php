<?php

use yii\helpers\Html;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Guestbook */

$this->title = Module::t('module', 'UPDATE') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'GUESTBOOK'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('module', 'UPDATE');
?>
<div class="guestbook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
