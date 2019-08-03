<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PendakiGunungSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaki-gunung-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pendaki') ?>

    <?= $form->field($model, 'id_gunung_jalur_masuk') ?>

    <?= $form->field($model, 'id_gunung_jalur_keluar') ?>

    <?= $form->field($model, 'tanggal_masuk') ?>

    <?php // echo $form->field($model, 'tanggal_keluar') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
