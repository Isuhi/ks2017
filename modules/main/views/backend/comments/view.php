<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\main\Module;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Comments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'COMMENTS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

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
//            'parent_id',
						[
							'attribute' => 'parent_id',
							'value' => ArrayHelper::getValue($model, 'parent.text') ,
						],
//            'article_id',
						[
							'attribute' => 'article_id',
							'value' => ArrayHelper::getValue($model, 'article.title') ,
						],
            'username',
            'email:email',
            'url:url',
             [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
             [
							'attribute' => 'updated_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
            'text:ntext',
            'visible:boolean',
            'role',
        ],
    ]) ?>

</div>
