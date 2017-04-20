<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'STATICPAGES');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staticpages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'STATICPAGES_CREATE'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'alias',
//            'keywords:ntext',
//            'description:ntext',
            // 'text:ntext',
             'visible:boolean',
             'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
