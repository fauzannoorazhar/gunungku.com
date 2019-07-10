<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GunungJalurPos */

$this->title = "Tambah Gunung Jalur Pos";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Jalur Pos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-jalur-pos-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
