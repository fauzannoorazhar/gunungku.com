<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = 'SignUp';
?>

<?php $form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_VERTICAL,
    'enableClientValidation' => false,
    'options' => [
        'class' => 'text-left'
    ]
]); ?>

<div class="register-box">
    <br>
    <div class="register-logo">
        <!--<div class="row">
            <div class="col-sm-4 col-xs-12">
                <img src="<?php /*echo Yii::$app->request->baseUrl; */?>/images/logo.png" style="width: 225px">
            </div>
            <div class="col-sm-4 col-xs-12">
                <p class="register-box-title" style="font-size: 25px">FORM PENDAFTARAN <b>ALUMNI</b></p>
            </div>
        </div>-->
        <br>
    </div>

    <div class="register-box-body">

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'placeholder' => 'Nama']) ?>
            </div>

            <div class="col-md-6 col-xs-12">
                <?= $form->field($model, 'nik')->textInput(['maxlength' => true,'placeholder' => 'NIK']) ?>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 col-xs-12">
                <?= $form->field($model, 'jenis_kelamin')->dropDownList(\app\models\Pendaki::getListPendakiJenisKelamin(), ['prompt' => '-- Pilih Jenis Kelamin --']); ?>
            </div>

            <div class="col-md-4 col-xs-12">
                <?= $form->field($model, 'tanggal_lahir')->widget(\kartik\date\DatePicker::class, [
                    'removeButton' => false,
                    'options' => ['placeholder' => 'Tanggal'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>

            <div class="col-md-4 col-xs-12">
                <?= $form->field($model, 'nomor_telpon',[
                    'addon' => ['prepend' => ['content'=>'+62']]
                ])->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <?= $form->field($model, 'alamat')->textarea(['rows' => 5]) ?>

                <hr>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'Email']) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder' => 'Password Akun']) ?>
            </div>
            <div class="col-md-6 col-xs-12">
                <?= $form->field($model, 'file_pengenal')->widget(\kartik\file\FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        /*'showCaption' => false,*/
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'Pilih Gambar'
                    ]
                ])->label('Upload File Pengenal (KTP/SIM/Kartu Pelajar)'); ?>
            </div>
        </div>

        <?= Html::hiddenInput('referrer',$referrer); ?>

        <?= Html::submitButton('Buat Akun', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button pull-right']) ?>

        <hr>

        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <?= Html::a('Kembali Ke Beranda <i class="fa fa-home"></i>', ['site/index'], ['class' => 'anchor-black pull-left']); ?>
            </div>
            <div class="col-sm-6 col-xs-6">
                <?= Html::a('<i class="fa fa-sign-in"></i> Kembali Ke Login', ['site/login'], ['class' => 'anchor-black pull-right']); ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
