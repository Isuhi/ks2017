<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Guestbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'CREATE') : Module::t('module', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
