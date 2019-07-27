<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gunung */

$this->title = "Detail Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="gunung-view box box-danger">

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
                ]
            ],
        ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-list"></i> Daftar Gunung', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">
            Kuota Pendakian
        </h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle; text-align: center; width: 45px">No</th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center">Hari, Tanggal</th>
                        <th colspan="<?= $model->countGunungJalur ?>" style="text-align: center">Pintu Masuk</th>
                    </tr>
                    <tr>
                        <?php foreach($model->manyGunungJalur as $gunungJalur) { ?>
                            <?php /* @var $gunungJalur \app\models\GunungJalur */ ?>
                            <th style="width: 250px; text-align: center"><?= $gunungJalur->nama ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach (\app\components\Helper::getHariBulanList() as $hari) { ?>
                        <tr>
                            <td style="text-align: center"><?= $no++ ?></td>
                            <td style="text-align: center">
                                <?= \app\components\Helper::getNamaHariTanggal($hari) ?>
                            </td>
                            <?php foreach($model->manyGunungJalur as $gunungJalur) { ?>
                                <?php /* @var $gunungJalur \app\models\GunungJalur */ ?>
                                <td style="text-align: center">
                                    <?= Html::a('<i class="fa fa-plus"></i>',['gunung-kuota/create','id_gunung_jalur' => $gunungJalur->id,'tanggal' => $hari],['data-toggle' => 'tooltip','title' => 'Input Kuota']) ?>
                                    <?= "" ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
