<?php

use yii\helpers\Html;

use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Comments */

$this->title = Module::t('module', 'CREATE_COMMENT');
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'COMMENTS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
