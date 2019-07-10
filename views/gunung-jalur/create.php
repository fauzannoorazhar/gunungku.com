<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GunungJalur */

$this->title = "Tambah Gunung Jalur";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Jalurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-jalur-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
