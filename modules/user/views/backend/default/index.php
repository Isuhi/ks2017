<?php

use app\components\grid\ActionColumn;
use app\components\grid\SetColumn;
use app\components\grid\LinkColumn;

use yii\helpers\Url;
use app\modules\user\models\backend\User;
use app\modules\user\widgets\backend\grid\RoleColumn;
use app\modules\user\Module;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\helpers\Html;
//use app\modules\admin\components\UserStatusColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('module', 'ADMIN_USERS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('module', 'ADMIN_USERS_CREATE'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
						[
							'filter' => DatePicker::widget([
								'model' => $searchModel,
								'attribute' => 'date_from',
								'attribute2' => 'date_to',
								'type' => DatePicker::TYPE_RANGE,
								'separator' => '-',
								'pluginOptions' => ['format' => 'yyyy-mm-dd']
							]),
							'attribute' => 'created_at',
							'format' => ['date', 'php:d.m.Y'],
						],
            [
							'class' => LinkColumn::className(),
							'attribute' => 'username',
//							Если надо не на vieew, а на update:
//							'url' => function ($data) {
//									return Url::to(['update', 'id' => $data->id]);
//							},
						],
						'email:email',
						[
							'class' => SetColumn::className(),
							'filter' => User::getStatusesArray(),
							'attribute' => 'status',
							'name' => 'statusName',
							'cssCLasses' => [
									User::STATUS_ACTIVE => 'success',
									User::STATUS_WAIT => 'warning',
									User::STATUS_BLOCKED => 'default',
							],
						],
						[
							'class' => RoleColumn::className(),
							'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'),
							'attribute' => 'role',
						],        

            ['class' => ActionColumn::className()],
        ],
    ]); ?>
</div>
