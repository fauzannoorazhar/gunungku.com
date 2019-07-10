<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisGunung */

$this->title = "Detail Jenis Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Gunung'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-gunung-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Jenis Gunung</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
                'value' => $model->deskripsi,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Jenis Gunung', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Jenis Gunung', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
