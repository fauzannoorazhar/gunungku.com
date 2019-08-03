<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PendakiGunung */

$this->title = "Sunting Pendaki Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendaki Gunungs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="pendaki-gunung-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
