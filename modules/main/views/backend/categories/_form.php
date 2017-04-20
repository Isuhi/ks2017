<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\models\backend\Categories;
use app\modules\main\Module;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Categories::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => Module::t('module', 'PARENT_CATEGORY')]) ?>
    <?php //= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Categories::find()->orderBy('name')->asArray()->all(), 'id', 'name', 'group'), ['prompt' => Module::t('module', 'PARENT_CATEGORY')]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?php echo translit($model->name) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('module', 'CREATE') : Module::t('module', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
