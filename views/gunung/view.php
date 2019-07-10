<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gunung */

$this->title = "Detail Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Gunung</h3>
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
            [
                'attribute' => 'ketinggian',
                'format' => 'raw',
                'value' => $model->ketinggianMdpl,
            ],
            [
                'attribute' => 'id_jenis_gunung',
                'format' => 'raw',
                'value' => $model->jenisGunung->nama,
            ],
            [
                'attribute' => 'status_aktif',
                'format' => 'raw',
                'value' => $model->statusGunungAktif,
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => $model->statusGunung,
            ],
            [
                'attribute' => 'kuota',
                'format' => 'raw',
                'value' => $model->kuota,
            ],
            [
                'attribute' => 'deskripsi_izin',
                'format' => 'raw',
                'value' => $model->deskripsi_izin,
            ],
            [
                'attribute' => 'deskripsi_wajib',
                'format' => 'raw',
                'value' => $model->deskripsi_wajib,
            ],
            [
                'attribute' => 'deskripsi_dilarang',
                'format' => 'raw',
                'value' => $model->deskripsi_dilarang,
            ],
            [
                'attribute' => 'deskripsi_sanksi',
                'format' => 'raw',
                'value' => $model->deskripsi_sanksi,
            ],
            [
                'attribute' => 'deskripsi_kontak',
                'format' => 'raw',
                'value' => $model->deskripsi_kontak,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Gunung', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Gunung', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>