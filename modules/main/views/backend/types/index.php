<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'ADMIN_TYPE');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'CREATE_TYPE'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
						[
							'attribute' => 'parent_id',
							'value' => 'parent.name',
						],
            'name',
            'alias',
//            'keywords:ntext',
            // 'description:ntext',
						[
							'attribute' => 'visible',
							'filter' => [
								0 => 'Нет',
								1 => 'Да',
							],
							'format' => 'boolean',
						],
            // 'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
