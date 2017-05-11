<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\Module;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= translit($model->title) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anons')->widget(CKEditor::className(),
				[
					'editorOptions' => [
						 'height' => 200,
						 'allowedContent' => true,
					 ],
				 ]); ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),
				[
					'editorOptions' => [
						 'height' => 400,
						 'allowedContent' => true,
					 ],
				 ]); ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'CREATE') : Module::t('module', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
