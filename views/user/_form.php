<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\UserRole;
use app\models\Unit;
use app\models\Unit1;
use app\models\Unit2;
use app\models\Satker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
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

<div class="user-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form User</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?php if ($model->isNewRecord) { ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_konfirmasi')->passwordInput(['maxlength' => true]) ?>
        
        <?php }; ?>


        <?php if($model->id_user_role==2) { ?>
        <?= $form->field($model, 'id_unit1')->widget(Select2::className(),[
            'data' => Unit1::getList(),
            'options' => [
                'placeholder' => '- Pilih Unit Eselon I -',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ]
        ]) ?>
        <?php } ?>
        
        <?php if($model->id_user_role==3) { ?>
        <?= $form->field($model, 'id_unit2')->widget(Select2::className(),[
            'data' => Unit2::getList(),
            'options' => [
                'placeholder' => '- Pilih Unit Eselon II -',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ]
        ]) ?>
        <?php } ?>


        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
