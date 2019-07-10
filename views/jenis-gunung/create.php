<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisGunung */

$this->title = "Tambah Jenis Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Gunungs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-gunung-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
