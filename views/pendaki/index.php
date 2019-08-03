<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PendakiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pendaki');
$this->params['breadcrumbs'][] = $this->title;
?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="pendaki-index box box-danger">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Pendaki', ['create'], ['class' => 'btn btn-success btn-flat']) ?>

    </div>

    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center; width: 50px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => function(\app\models\Pendaki $data) {
                    return $data->nama.'<br>'.$data->nik;
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'jenis_kelamin',
                'format' => 'raw',
                'filter' => \app\models\Pendaki::getListPendakiJenisKelamin(),
                'value' => function(\app\models\Pendaki $data) {
                    return $data->namaJenisKelamin;
                },
                'headerOptions' => ['style' => 'text-align:center; width: 175px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'tanggal_lahir',
                'format' => 'raw',
                'value' => function(\app\models\Pendaki $data) {
                    return \app\components\Helper::getTanggal($data->tanggal_lahir);
                },
                'headerOptions' => ['style' => 'text-align:center; width: 175px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center; width: 175px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'label' => "",
                'format' => 'raw',
                'encodeLabel' => false,
                'value' => function(\app\models\Pendaki $data) {
                    return Html::a('<i class="fa fa-calendar-check-o"></i>',['pendaki/view-pendakian','id' => $data->id],['data-toggle' => 'tooltip','title' => 'Lihat Daftar Pendakian Gunung']);
                },
                'headerOptions' => ['style' => 'text-align:center; width: 35px'],
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
