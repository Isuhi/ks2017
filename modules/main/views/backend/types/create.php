<?php

use yii\helpers\Html;
use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Types */

$this->title = Module::t('module', 'CREATE_TYPE');
$this->params['breadcrumbs'][] = ['label' => 'Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
