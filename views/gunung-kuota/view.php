<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GunungKuota */

$this->title = "Detail Gunung Kuota";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Kuota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-kuota-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Gunung Kuota</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'label' => 'Gunung',
                'format' => 'raw',
                'value' => $model->gunungJalur->gunung->nama,
            ],
            [
                'attribute' => 'id_gunung_jalur',
                'format' => 'raw',
                'value' => $model->gunungJalur->nama,
            ],
            [
                'attribute' => 'kuota',
                'format' => 'raw',
                'value' => $model->kuota,
            ],
            [
                'attribute' => 'tanggal',
                'format' => 'raw',
                'value' => \app\components\Helper::getTanggal($model->tanggal),
            ],
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asRelativeTime($model->created_at),
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asRelativeTime($model->updated_at),
            ],
            [
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' => $model->created_by,
            ],
            [
                'attribute' => 'updated_by',
                'format' => 'raw',
                'value' => $model->updated_by,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Gunung Kuota', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Gunung Kuota', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
