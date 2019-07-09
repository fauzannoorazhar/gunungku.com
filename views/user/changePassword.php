<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;


$this->title = 'Ganti Password';

$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([            
    'layout'=>'horizontal',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'wrapper' => 'col-sm-5',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Form Ganti Password</h3>
        </div>
        <div class="box-body">
            <div class="row">

                <?= $form->field($model, 'password_lama')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password_baru')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password_baru_konfirmasi')->passwordInput(['maxlength' => true])->label('Password Baru (Konfirmasi)') ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-offset-3 col-sm-3">
                    <?= Html::submitButton('<i class="fa fa-check"></i> Ganti Password', ['class' => 'btn btn-success btn-flat', 'name' => 'register-button']) ?>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>
