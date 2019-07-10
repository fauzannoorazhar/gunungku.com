<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisGunung */

$this->title = "Sunting Jenis Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Gunungs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="jenis-gunung-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
