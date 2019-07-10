<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalurPosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gunung-jalur-pos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_gunung_jalur') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'status_kemah') ?>

    <?= $form->field($model, 'sumber_air') ?>

    <div class="col-sm-2 col-xs-12">
        <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
