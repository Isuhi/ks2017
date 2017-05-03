<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\Module;
use app\modules\main\models\backend\Articles;
use app\modules\main\models\backend\Categories;
use app\modules\main\models\backend\Types;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= translit($model->title)?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categories_id')->dropDownList(Categories::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'type_id')->dropDownList(Types::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anons')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>


	

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'view')->textInput() ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <?= $form->field($model, 'comment')->checkbox() ?>

    <?= $form->field($model, 'master_class')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'CREATE') : Module::t('module', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
