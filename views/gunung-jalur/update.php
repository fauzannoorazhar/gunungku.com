<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalur */

$this->title = "Sunting Gunung Jalur";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Jalurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="gunung-jalur-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
