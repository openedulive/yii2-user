<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;
use yuncms\user\widgets\Connect;

/**
 * @var yii\web\View $this
 * @var yuncms\user\models\User $user
 * @var yuncms\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6 col-md-offset-3">
    <h1 class="h4 text-center text-muted"><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => ['autocomplete' => 'off'],
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'registrationPolicy')->checkbox()->label(
        Yii::t('user', 'Agree and accept {serviceAgreement} and {privacyPolicy}', [
            'serviceAgreement' => Html::a(Yii::t('user', 'Service Agreement'), ['/legal/terms']),
            'privacyPolicy' => Html::a(Yii::t('user', 'Privacy Policy'), ['/legal/privacy']),
        ]), [
            'encode' => false
        ]
    ) ?>

    <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block btn-lg']) ?>

    <?php ActiveForm::end(); ?>
    <hr>
    <div class="widget-login pt-30">
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
    </div>
</div>