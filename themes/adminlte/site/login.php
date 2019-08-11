<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SignIn';
$this->params['breadcrumbs'][] = $this->title;

$userFormOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$passwordFormOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'enableClientValidation' => false
]);
?>

<div class="login-box">
    <br>
    <div class="login-logo" style="margin-bottom: 5%">
        <!--<img src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/logo.png" style="width: 225px">
        <br>-->
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Masukkan Nama Pengguna Dan Kata Sandi</p>

        <?= $form->field($model, 'username',$userFormOptions)->textInput(['autofocus' => true,'placeholder' => 'Username'])->label(false) ?>

        <?= $form->field($model, 'password',$passwordFormOptions)->passwordInput(['placeholder' => 'Password'])->label(false) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <?= Html::a('Kembali Ke Beranda', ['site/index'], ['class' => 'anchor-black']); ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in <i class="fa fa-sign-in"></i>', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-5 col-xs-12">
                <?= Html::a('Lupa Password?', $url = null, ['class' => 'anchor-black']); ?>
            </div>
            <div class="col-sm-7 col-xs-12">
                <?= Html::a('Belum Mempunyai Akun', ['site/registrasi'], ['class' => 'pull-right anchor-black']); ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
