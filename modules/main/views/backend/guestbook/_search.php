<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\GuestbookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php  echo $form->field($model, 'text') ?>

    <?php  echo $form->field($model, 'visible') ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('module', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Module::t('module', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
