<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;
use app\modules\main\models\backend\Categories;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'ADMIN_CATEGORIES');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'ADMIN_CATEGORIES_CREATE'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//			'filterModel' => $searchModel,
        'columns' => [
					// Нумерация по порядку записей в бд:
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'parent_id',
            'name',
					[
						'attribute' => 'parent_id',
//						'filter' => Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
						'value' => 'parent.name',
					],
            'alias',
            //'keywords:ntext',
            // 'description:ntext',
             'text:ntext',
					[
						'attribute' => 'visible',
						'filter' => [
							0 => 'Нет',
							1 => 'Да',
						],
						'format' => 'boolean',
					],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
