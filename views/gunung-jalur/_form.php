<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalur */
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

<div class="gunung-jalur-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Gunung Jalur</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_gunung')->widget(\kartik\select2\Select2::className(),[
            'data' => \app\models\Gunung::getList(),
            'options' => [
                'placeholder' => '- Pilih Gunung -',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ]
        ]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jarak_puncak',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content'=>'Km']],
        ])->textInput() ?>

        <?= $form->field($model, 'jam_perjalanan',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content'=>'Jam']],
        ])->textInput() ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php \kartik\form\ActiveForm::end(); ?>
