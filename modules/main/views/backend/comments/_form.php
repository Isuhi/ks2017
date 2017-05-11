<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\Module;
use app\modules\main\models\backend\Comments;
use app\modules\main\models\backend\Articles;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form"> 

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'article_id')->dropDownList(Articles::find()->select(['title', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'CREATE') : Module::t('module', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
