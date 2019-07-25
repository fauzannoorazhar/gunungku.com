<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalurPos */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
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

<div class="gunung-jalur-pos-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Gunung Jalur Pos</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_gunung_jalur')->widget(\kartik\select2\Select2::className(),[
            'data' => \app\models\GunungJalur::getList(),
            'options' => [
                'placeholder' => '- Pilih Jalur -',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ]
        ]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_kemah',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
        ])->dropDownList([1 => 'Ya', 0 => 'Tidak'], ['prompt' => '-- Pilih Status Kemah --']); ?>

        <?= $form->field($model, 'sumber_air',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
        ])->dropDownList([1 => 'Ya', 0 => 'Tidak'], ['prompt' => '-- Pilih Sumber Air --']); ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
