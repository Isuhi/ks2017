<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\main\Module;
use app\modules\main\models\backend\Types;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Types */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Types::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => Module::t('module', 'PARENT_TYPES')]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?php echo translit($model->name) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),
				[
					'editorOptions' => [
						 'height' => 200,
						 'allowedContent' => true,
					 ],
				 ]); ?>

    <?= $form->field($model, 'visible')->checkbox()  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'CREATE') : Module::t('module', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
