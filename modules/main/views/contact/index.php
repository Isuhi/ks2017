<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\main\Module;
use yii\captcha\Captcha;

$this->title = Module::t('module', 'TITLE_CONTACT');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-contact-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <?= Module::t('module', 'CONTACT_THANKS') ?>
        </div>

        <p>
            Обратите внимание: если вы включите отладчик Yii, вы сможете просматривать почтовое сообщение на панели почты отладчика.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Поскольку приложение находится в режиме разработки, сообщение не отправляется, а сохраняется как файл в <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Пожалуйста, настройте <code> useFileTransport </code> свойство <code> mail </code>
                Компонент приложения должен быть ложным, чтобы отправлять электронную почту.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Если у вас есть деловые вопросы или другие вопросы, заполните следующую форму, чтобы связаться с нами.
            Спасибо.
        </p>

        <div class="row">
					<div class="col-lg-5">
						<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
							<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
							<?= $form->field($model, 'email') ?>
							<?= $form->field($model, 'subject') ?>
							<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
							<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
'captchaAction' => '/main/contact/captcha',
'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]) ?>
							<div class="form-group">
									<?= Html::submitButton(Module::t('module', 'BUTTON_SEND'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
							</div>
						<?php ActiveForm::end(); ?>
					</div>
        </div>

    <?php endif; ?>
</div>
