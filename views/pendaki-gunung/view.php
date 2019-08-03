<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PendakiGunung */

$this->title = "Detail Pendaki Gunung";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendaki Gunung'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaki-gunung-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Pendaki Gunung</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'id_pendaki',
                'format' => 'raw',
                'value' => $model->id_pendaki,
            ],
            [
                'attribute' => 'id_gunung_jalur_masuk',
                'format' => 'raw',
                'value' => $model->id_gunung_jalur_masuk,
            ],
            [
                'attribute' => 'id_gunung_jalur_keluar',
                'format' => 'raw',
                'value' => $model->id_gunung_jalur_keluar,
            ],
            [
                'attribute' => 'tanggal_masuk',
                'format' => 'raw',
                'value' => $model->tanggal_masuk,
            ],
            [
                'attribute' => 'tanggal_keluar',
                'format' => 'raw',
                'value' => $model->tanggal_keluar,
            ],
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => $model->created_at,
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'value' => $model->updated_at,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pendaki Gunung', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Pendaki Gunung', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
