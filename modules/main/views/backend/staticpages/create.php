<?php

use yii\helpers\Html;
use app\modules\main\Module;


/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Staticpages */

$this->title = Module::t('module', 'STATICPAGES_CREATE');
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'STATICPAGES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staticpages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
