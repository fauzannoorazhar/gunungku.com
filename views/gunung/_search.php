<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GunungSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gunung-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'ketinggian') ?>

    <?= $form->field($model, 'jenis') ?>

    <?php // echo $form->field($model, 'status_aktif') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'kuota') ?>

    <?php // echo $form->field($model, 'deskripsi_izin') ?>

    <?php // echo $form->field($model, 'deskripsi_wajib') ?>

    <?php // echo $form->field($model, 'deskripsi_dilarang') ?>

    <?php // echo $form->field($model, 'deskripsi_sanksi') ?>

    <?php // echo $form->field($model, 'deskripsi_kontak') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
