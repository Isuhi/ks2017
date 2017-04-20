<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;
use app\modules\main\models\backend\Categories;
use app\modules\main\models\backend\Types;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\main\models\backend\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'ARTICLES');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('module', 'ARTICLES_CREATE'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'alias',
            [
							'attribute' => 'categories_id',
							'filter' => Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
							'value' => 'categories.name',
						],
            [
							'attribute' => 'type_id',
							'filter' => Types::find()->select(['name', 'id'])->indexBy('id')->column(),
							'value' => 'type.name',
						],
            // 'keywords:ntext',
            // 'description:ntext',
            // 'anons:ntext',
            // 'text:ntext',
            // 'author',
             [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
             [
							'attribute' => 'updated_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],             
//             'img',
             'view',
             [
							 'attribute' => 'visible',
							 'filter' => [0 => 'Нет', 1 => 'Да'],
							 'format' => 'boolean',
						 ],
             [
							 'attribute' => 'comment',
							 'filter' => [0 => 'Нет', 1 => 'Да'],
							 'format' => 'boolean',
						 ],
             [
							 'attribute' => 'master_class',
							 'filter' => [0 => 'Нет', 1 => 'Да'],
							 'format' => 'boolean',
						 ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>



