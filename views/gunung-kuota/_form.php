<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GunungKuota */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
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

<div class="gunung-kuota-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Gunung Kuota</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_gunung')->widget(\kartik\select2\Select2::class, [
            'data' => \app\models\Gunung::getList(),
            'options' => [
                'id' => 'id-gunung',
                'placeholder' => '- Pilih Gunung -',
            ],
            'pluginOptions' => [
                //'allowClear' => true
            ],
        ])->label('Gunung'); ?>

        <?= $form->field($model, 'id_gunung_jalur')->widget(\kartik\depdrop\DepDrop::class, [
            'type' => \kartik\depdrop\DepDrop::TYPE_SELECT2,
            'data' => \app\models\GunungJalur::getList(),
            'pluginOptions' => [
                'depends' => ['id-gunung'],
                'placeholder' => '- Pilih Jalur -',
                'url' => \yii\helpers\Url::to(['gunung-jalur/get-list','selected' => $model->id_gunung_jalur]),
                'initialize' => true
            ]
        ]); ?>

        <?= $form->field($model, 'kuota',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content'=>'Orang']],
        ])->textInput(['type' => 'number','min' => 1]) ?>

        <?= $form->field($model, 'tanggal')->widget(\kartik\date\DatePicker::className(), [
            'removeButton' => false,
            'options' => ['placeholder' => 'Tanggal'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
