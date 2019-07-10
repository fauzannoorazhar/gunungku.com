<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gunung */

$this->title = "Tambah Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunungs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
