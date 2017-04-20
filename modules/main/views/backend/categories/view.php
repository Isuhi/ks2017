<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\main\Module;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_CATEGORIES') , 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'UPDATE'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
						'value' => ArrayHelper::getValue($model, 'parent.name') ,
					],
            'name',
            'alias',
            'keywords:ntext',
            'description:ntext',
            'text:ntext',
            'visible:boolean',
        ],
    ]) ?>

</div>
