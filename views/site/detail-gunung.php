<?php

/* @var $gunung \app\models\Gunung */
/* @var $this yii\web\View */

$this->title = 'Pendaftaran '.$gunung->nama;

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
        <span><i class="fa fa-angle-right"></i><?= \yii\helpers\Html::a('Pendaftaran Online',['site/pendaftaran-online']) ?>
        <span><i class="fa fa-angle-right"></i><?= $gunung->nama ?></span>
    </div>
</div>

<!-- Page -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-list-page">
                <div class="single-list-slider owl-carousel" id="sl-slider">
                    <div class="sl-item set-bg" data-setbg="<?= $gunung->pathGambar ?>">
                        <div class="<?= $gunung->labelStatus ?>"><?= $gunung->statusGunung ?></div>
                    </div>
                </div>
                <div class="single-list-content">
                    <div class="row">
                        <div class="col-xl-8 sl-title">
                            <h2><?= $gunung->nama ?></h2>
                            <p><i class="fa fa-map-marker"></i><?= $gunung->lokasi ?></p>
                        </div>
                        <div class="col-xl-4">
                            <a href="#" class="price-btn"><?= $gunung->ketinggianMdpl ?></a>
                        </div>
                    </div>
                    <h3 class="sl-sp-title">Rincian Gunung</h3>
                    <div class="row property-details-list">
                        <div class="col-md-4 col-sm-6">
                            <p><i class="fa fa-map-signs"></i> <?= $gunung->countGunungJalur ?> Jalur Pendakian</p>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <p><i class="fa fa-free-code-camp"></i> <?= $gunung->countJalurPos ?> Pos Pendakian</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fa fa-calendar-check-o"></i> <?= $gunung->getCountKuotaJalur(date('Y-m-d')) ?> Kuota Pendakian</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?= \kartik\grid\GridView::widget([
                                'dataProvider' => $dataProvider,
                                'striped' => false,
                                'hover' => true,
                                'columns' => [
                                    [
                                        'class' => 'yii\grid\SerialColumn',
                                        'header' => 'No',
                                        'headerOptions' => ['style' => 'text-align:center'],
                                        'contentOptions' => ['style' => 'text-align:center'],
                                    ],
                                    [
                                        'class' => 'kartik\grid\ExpandRowColumn',
                                        'value' => function ($model, $key, $index, $column) {
                                            return \kartik\grid\GridView::ROW_COLLAPSED;
                                        },
                                        'detail' => function ($model, $key, $index, $column) {
                                            return $this->render('_expand-gunung', ['gunungJalur' => $model]);
                                        },
                                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                                        'expandOneOnly' => true,
                                    ],
                                    [
                                        'attribute' => 'nama',
                                        'format' => 'raw',
                                        'headerOptions' => ['style' => 'text-align:center;'],
                                        'contentOptions' => ['style' => 'text-align:left;'],
                                    ],
                                    [
                                        'attribute' => 'jarak_puncak',
                                        'format' => 'raw',
                                        'headerOptions' => ['style' => 'text-align:center;'],
                                        'contentOptions' => ['style' => 'text-align:center;'],
                                    ],
                                    [
                                        'attribute' => 'jam_perjalanan',
                                        'format' => 'raw',
                                        'headerOptions' => ['style' => 'text-align:center;'],
                                        'contentOptions' => ['style' => 'text-align:center;'],
                                    ],
                                    [
                                        'label' => "Jumlah <br> Pos",
                                        'format' => 'raw',
                                        'encodeLabel' => false,
                                        'value' => function(\app\models\GunungJalur $data) {
                                            return $data->countGunungJalurPos;
                                        },
                                        'headerOptions' => ['style' => 'text-align:center; width: 80px'],
                                        'contentOptions' => ['style' => 'text-align:center;'],
                                    ],
                                ],
                        ]);?>
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapse-acordion" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        Deskripsi Gunung
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <?= $gunung->deskripsi ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapse-acordion" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        Deskripsi Perizinan
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?= $gunung->deskripsi_izin ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapse-acordion" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        Deskripsi Kelengkapan Wajib Pendaki</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?= $gunung->deskripsi_wajib ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapse-acordion" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                        Deskripsi Larangan Pendaki
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?= $gunung->deskripsi_dilarang ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="collapse-acordion" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Deskripsi Sanksi Pendaki
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?= $gunung->deskripsi_sanksi ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="sl-sp-title bd-no">Lokasi</h3>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=gunung%20ceremai&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
                            <a href="https://www.embedgooglemap.net/blog/20-off-discount-for-elegant-themes-divi-sale-coupon-code-2019/">divi discount code</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar">
                <!--<div class="author-card">
                    <div class="author-img set-bg" data-setbg="img/author.jpg"></div>
                    <div class="author-info">
                        <h5>Gina Wesley</h5>
                        <p>Real Estate Agent</p>
                    </div>
                    <div class="author-contact">
                        <p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
                        <p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
                    </div>
                </div>-->
                <div class="contact-form-card">
                    <h5>Silahkan Ajukan Pertanyaan</h5>
                    <form>
                        <input type="text" placeholder="Nama">
                        <input type="text" placeholder="Email">
                        <textarea placeholder="Pertanyaan"></textarea>
                        <button>KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page end -->
