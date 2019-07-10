<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalurPos */

$this->title = "Sunting Gunung Jalur Pos";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Jalur Pos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="gunung-jalur-pos-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
