<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\main\models\backend\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'NEWS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('module', 'NEWS_CREATE'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'alias',
//            'keywords:ntext',
//            'description:ntext',
            // 'anons:ntext',
            // 'text:ntext',
             [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
             [
							'attribute' => 'updated_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
             [
							 'attribute' => 'visible',
							 'filter' => [0 => 'Нет', 1 => 'Да'],
							 'format' => 'boolean',
						 ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
