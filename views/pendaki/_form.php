<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaki */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = \kartik\form\ActiveForm::begin([
    'type'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="pendaki-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Pendaki</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nik')->textInput() ?>

        <?= $form->field($model, 'jenis_kelamin')->dropDownList(\app\models\Pendaki::getListPendakiJenisKelamin(), ['prompt' => '-- Pilih Jenis Kelamin --']); ?>

        <?= $form->field($model, 'tanggal_lahir')->widget(\kartik\date\DatePicker::class, [
            'removeButton' => false,
            'options' => ['placeholder' => 'Tanggal'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>

        <?= $form->field($model, 'nomor_telpon',[
            'addon' => ['prepend' => ['content'=>'+62']]
        ])->textInput() ?>

        <?= $form->field($model, 'nomor_kerabat',[
            'addon' => ['prepend' => ['content'=>'+62']]
        ])->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'id_provinsi')->textInput() ?>

        <?= $form->field($model, 'id_kabupaten')->textInput() ?>

        <?= $form->field($model, 'file_pengenal')->textInput(['maxlength' => true]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php \kartik\form\ActiveForm::end(); ?>
