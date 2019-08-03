<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaki */

$this->title = "Detail Pendaki";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendaki'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaki-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Pendaki</h3>
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
                'attribute' => 'nik',
                'format' => 'raw',
                'value' => $model->nik,
            ],
            [
                'attribute' => 'jenis_kelamin',
                'format' => 'raw',
                'value' => $model->namaJenisKelamin,
            ],
            [
                'attribute' => 'tanggal_lahir',
                'format' => 'raw',
                'value' => \app\components\Helper::getTanggal($model->tanggal_lahir),
            ],
            [
                'attribute' => 'nomor_telpon',
                'format' => 'raw',
                'value' => $model->nomor_telpon,
            ],
            [
                'attribute' => 'nomor_kerabat',
                'format' => 'raw',
                'value' => $model->nomor_kerabat,
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => $model->email,
            ],
            [
                'attribute' => 'alamat',
                'format' => 'raw',
                'value' => $model->alamat,
            ],
            [
                'attribute' => 'id_provinsi',
                'format' => 'raw',
                'value' => $model->id_provinsi,
            ],
            [
                'attribute' => 'id_kabupaten',
                'format' => 'raw',
                'value' => $model->id_kabupaten,
            ],
            [
                'attribute' => 'file_pengenal',
                'format' => 'raw',
                'value' => $model->file_pengenal,
            ],
            [
                'attribute' => 'slug',
                'format' => 'raw',
                'value' => $model->slug,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pendaki', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pendaki', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
