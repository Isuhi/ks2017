<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\main\Module;
use app\modules\main\models\backend\Articles;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\main\models\backend\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'COMMENTS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('module', 'CREATE_COMMENT'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
		<?php// debug($searchModel->article) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'parent_id',
            [
							'attribute' => 'parent_id',
							'value' => 'parent.text',
						],
//            'article_id',
						[
							'attribute' => 'article_id',
							'filter' => Articles::find()->select(['title', 'id'])->indexBy('id')->column(),
							'value' => 'article.title',
						],
						'username',
            'email:email',
            // 'url:url',
             [
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						 ],
             [
							'attribute' => 'updated_at',
							'format' => ['date', 'php:d.m.Y'],
						 ], 
//						[
//							'filter' => DatePicker::widget([
//								'model' => $searchModel,
//								'attribute' => 'date_from',
//								'attribute2' => 'date_to',
//								'type' => DatePicker::TYPE_RANGE,
//								'separator' => '-',
//								'pluginOptions' => ['format' => 'yyyy-mm-dd']
//							]),
//							'attribute' => 'created_at',
//							'format' => ['date', 'php:d.m.Y'],
//						],
             'text:ntext',
             [
							 'attribute' => 'visible',
							 'filter' => [0 => 'Нет', 1 => 'Да'],
							 'format' => 'boolean',
						 ],
             'role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
