<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\main\models\backend\GuestbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'GUESTBOOK');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('module', 'CREATE_ENTRY'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'url:url',
            [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
            'text:ntext',
            [
							'attribute' => 'visible',
							'filter' => [0 => 'Нет', 1 => 'Да'],
							'format' => 'boolean'
						],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
