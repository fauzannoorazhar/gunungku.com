<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pendaki */

$this->title = "Tambah Pendaki";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendakis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaki-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
