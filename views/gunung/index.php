<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GunungSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Gunung');
$this->params['breadcrumbs'][] = $this->title;
?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="gunung-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Gunung', ['create'], ['class' => 'btn btn-success btn-flat']) ?>

    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => function(\app\models\Gunung $data) {
                    return $data->nama.'<br>'.$data->ketinggianMdpl;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
                'value' => function(\app\models\Gunung $data) {
                    return $data->getDeskripsiTruncate(200);
                },
                'headerOptions' => ['style' => 'text-align:center; width: 300px'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'id_jenis_gunung',
                'format' => 'raw',
                'filter' => \app\models\JenisGunung::getList(),
                'value' => function(\app\models\Gunung $data) {
                    return $data->jenisGunung->nama;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'status_aktif',
                'format' => 'raw',
                'filter' => \app\models\Gunung::getListStatusGunungAktif(),
                'value' => function(\app\models\Gunung $data) {
                    return $data->statusGunungAktif;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'filter' => \app\models\Gunung::getListStatusGunung(),
                'value' => function(\app\models\Gunung $data) {
                    return $data->statusGunung;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'kuota',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center; width: 100px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
    </div>
</div>
