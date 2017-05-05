<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\backend\Guestbook */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'GUESTBOOK'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-view">

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
            'name',
            'email:email',
            'url:url',
            [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
            'text:raw',
            'visible:boolean',
        ],
    ]) ?>

</div>
