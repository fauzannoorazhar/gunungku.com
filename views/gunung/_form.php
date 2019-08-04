<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gunung */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = \kartik\form\ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
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

        <?= $form->field($model, 'deskripsi',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-4',
                'error' => '',
                'hint' => '',
            ],
        ])->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'basic'
        ]) ?>

        <?= $form->field($model, 'lokasi')->textArea(['rows' => 3]) ?>

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
        ])->textInput(['type' => 'number','min' => 1,'placeholder' => 'Contoh : 2250, 1500']) ?>

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
        ])->textInput(['type' => 'number','min' => 1,'placeholder' => 'Contoh : 100, 250']) ?>

        <?= $form->field($model, 'link_website')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'link_map')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'deskripsi_izin',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ])->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'advanced'
        ]) ?>

        <?= $form->field($model, 'deskripsi_wajib',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ])->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'advanced'
        ]) ?>

        <?= $form->field($model, 'deskripsi_dilarang',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ])->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'advanced'
        ]) ?>

        <?= $form->field($model, 'deskripsi_sanksi',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ])->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'advanced'
        ]) ?>

        <?= $form->field($model, 'deskripsi_kontak',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ])->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'advanced'
        ]) ?>

        <?= $form->field($model, 'gambar')->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                /*'showCaption' => false,*/
                'showRemove' => false,
                'showUpload' => false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                'browseLabel' =>  'Pilih Gambar'
            ]
        ])->label('Upload Gambar'); ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php \kartik\form\ActiveForm::end(); ?>
