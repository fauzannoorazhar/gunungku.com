<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gunung */
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

<div class="gunung-form box box-danger">

    <div class="box-header">
        <h3 class="box-title">Form Gunung</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'id_jenis_gunung')->widget(\kartik\select2\Select2::className(),[
            'data' => \app\models\JenisGunung::getList(),
            'options' => [
                'placeholder' => '- Pilih Jenis Gunung -',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ]
        ]) ?>

        <?= $form->field($model, 'ketinggian',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content'=>'MDPL']],
        ])->textInput(['type' => 'number','min' => 1]) ?>

        <?= $form->field($model, 'status_aktif',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
        ])->dropDownList(\app\models\Gunung::getListStatusGunungAktif(), ['prompt' => '-- Pilih Status Gunung Aktif --']); ?>

        <?= $form->field($model, 'status',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
        ])->dropDownList(\app\models\Gunung::getListStatusGunung(), ['prompt' => '-- Pilih Status Gunung --']); ?>

        <?= $form->field($model, 'kuota',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-3',
                'error' => '',
                'hint' => '',
            ],
            'addon' => ['append' => ['content'=>'Orang']],
        ])->textInput(['type' => 'number','min' => 1]) ?>

        <?= $form->field($model, 'deskripsi_izin')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'deskripsi_wajib')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'deskripsi_dilarang')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'deskripsi_sanksi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'deskripsi_kontak')->textarea(['rows' => 6]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php \kartik\form\ActiveForm::end(); ?>
