<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\main\Module;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Articles */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ARTICLES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

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
            [
							'attribute' => 'categories_id',
							'value' => ArrayHelper::getValue($model, 'categories.name')
						],
            [
							'attribute' => 'type_id',
							'value' => ArrayHelper::getValue($model, 'type.name')
						],
            'keywords:ntext',
            'description:ntext',
            'anons:raw',
            'text:raw',
            'author',
             [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
             [
							'attribute' => 'updated_at',
							'format' => ['date', 'php:d.m.Y'],
						 ], 
            'img',
            'view',
            'visible:boolean',
            'comment:boolean',
            'master_class:boolean',
        ],
    ]) ?>

</div>
