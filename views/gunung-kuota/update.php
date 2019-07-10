<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GunungKuota */

$this->title = "Sunting Gunung Kuota";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Kuotas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="gunung-kuota-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
