<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GunungKuota */

$this->title = "Tambah Gunung Kuota";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Kuotas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-kuota-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
