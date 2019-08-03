<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaki */

$this->title = "Daftar Pendakian Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendaki'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaki-view box box-danger">

    <div class="box-header">
        <h3 class="box-title"><?= $this->title ?></h3>
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
            ],
        ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pendaki', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">
            Daftar Pendakian Gunung
        </h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px; vertical-align: middle;" rowspan="2">No</th>
                        <th class="text-center" style="vertical-align: middle;" rowspan="2">Gunung</th>
                        <th class="text-center" colspan="2">Jalur Pendakian</th>
                        <th class="text-center" colspan="2">Tanggal Pendakian</th>
                        <th class="text-center" style="width: 50px; vertical-align: middle;" rowspan="2"></th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width: 200px">
                            Masuk
                        </th>
                        <th class="text-center" style="width: 200px">
                            Keluar
                        </th>
                        <th class="text-center" style="width: 150px">
                            Masuk
                        </th>
                        <th class="text-center" style="width: 150px">
                            Keluar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($model->manyPendakiGunung as $pendakiGunung) { ?>
                    <?php /* @var $pendakiGunung \app\models\PendakiGunung */ ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?= @$pendakiGunung->gunungJalurMasuk->gunung->nama ?>
                            </td>
                            <td class="text-center">
                                <?= @$pendakiGunung->gunungJalurMasuk->nama ?>
                            </td>
                            <td class="text-center">
                                <?= @$pendakiGunung->gunungJalurKeluar->nama ?>
                            </td>
                            <td class="text-center">
                                <?= \app\components\Helper::getTanggalSingkat($pendakiGunung->tanggal_masuk) ?>
                            </td>
                            <td class="text-center">
                                <?= \app\components\Helper::getTanggalSingkat($pendakiGunung->tanggal_keluar) ?>
                            </td>
                            <td class="text-center">
                                <?= Html::a('<i class="fa fa-eye"></i>',['pendaki-gunung/view','id' => $pendakiGunung->id],['data-toggle' => 'tooltip','title' => 'Detail Pendakian Gunung']) ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
