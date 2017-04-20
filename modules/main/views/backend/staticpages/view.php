<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Staticpages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'STATICPAGES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staticpages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'UPDATE'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('module', 'CONFIRM_DELETION'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'alias',
            'keywords:ntext',
            'description:ntext',
            'text:raw',
            'visible:boolean',
            'position',
        ],
    ]) ?>

</div>
