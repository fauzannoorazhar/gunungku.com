<?php

/* @var $gunung \app\models\Gunung */
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Pengajuan Pendaftaran '.$gunung->nama;

?>

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/bg2.jpg">
    <div class="container text-white">
        <h2><?= $this->title ?></h2>
    </div>
</section>
<!--  Page top end -->

<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <?= \yii\helpers\Html::a('<i class="fa fa-home"></i> Home',['site/index']) ?>
        <span><i class="fa fa-angle-right"></i><?= \yii\helpers\Html::a('Pendaftaran Online',['site/pendaftaran-online']) ?></span>
        <span><i class="fa fa-angle-right"></i><?= \yii\helpers\Html::a($gunung->nama,['site/detail-gunung','slug' => $gunung->slug]) ?></span>
        <span><i class="fa fa-angle-right"></i><?= 'Pengajuan Pendaftaran' ?></span>
    </div>
</div>

<!-- Page -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 single-list-page">
                <div class="single-list-content">
                    <div class="row">
                        <div class="col-xl-8 sl-title">
                            <h2><?= $gunung->nama ?></h2>
                            <p><i class="fa fa-map-marker"></i><?= $gunung->lokasi ?></p>
                        </div>
                        <div class="col-xl-4">
                            <span class="price-btn"><?= $gunung->ketinggianMdpl ?></span>
                        </div>
                    </div>
                    <div class="row property-details-list">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <p><i class="fa fa-map-signs"></i> <?= $gunung->countGunungJalur ?> Jalur Pendakian</p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <p><i class="fa fa-free-code-camp"></i> <?= $gunung->countJalurPos ?> Pos Pendakian</p>
                        </div>
                        <div class="col-md-4 col-md-12 col-xs-12">
                            <p><i class="fa fa-calendar-check-o"></i> <?= $gunung->getCountKuotaJalur(date('Y-m-d')) ?> Kuota Pendakian</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle; text-align: center; width: 45px">No</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center">Hari, Tanggal</th>
                                <th colspan="<?= $gunung->countGunungJalur ?>" style="text-align: center">Pintu Masuk</th>
                            </tr>
                            <tr>
                                <?php foreach($gunung->manyGunungJalur as $gunungJalur) { ?>
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
                                    <?php foreach($gunung->manyGunungJalur as $gunungJalur) { ?>
                                        <?php /* @var $gunungJalur \app\models\GunungJalur */ ?>
                                        <?php $gunungKuota = \app\models\GunungKuota::findGunungKuotaByCondition(['id_gunung_jalur' => $gunungJalur->id,'tanggal' => $hari]) ?>
                                        <td style="text-align: center">
                                            <?php if ($gunungKuota === null) { ?>
                                                <?= '<span style="border-bottom: dashed 1px">'.$gunung->kuota.'</span>' ?>
                                            <?php } else { ?>
                                                <?= '<span data-toggle="tooltip" title="Kuota Sudah Di Input">'.@$gunungKuota->kuota.'</span>' ?>
                                            <?php } ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page end -->
