<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisGunungSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-gunung-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
