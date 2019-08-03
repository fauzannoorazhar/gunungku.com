<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PendakiGunung */

$this->title = "Tambah Pendaki Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendaki Gunungs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaki-gunung-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
