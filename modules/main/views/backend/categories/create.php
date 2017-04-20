<?php

use yii\helpers\Html;
use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */

$this->title = Module::t('module', 'CREATE_CATEGORY');
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_CATEGORIES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo debug(Yii::$app->request->post());
?>

<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
