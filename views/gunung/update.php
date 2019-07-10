<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gunung */

$this->title = "Sunting Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunungs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="gunung-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
