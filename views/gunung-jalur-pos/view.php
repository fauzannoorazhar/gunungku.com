<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalurPos */

$this->title = "Detail Gunung Jalur Pos";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Jalur Pos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-jalur-pos-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Gunung Jalur Pos</h3>
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
                'attribute' => 'id_gunung_jalur',
                'format' => 'raw',
                'value' => $model->id_gunung_jalur,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'status_kemah',
                'format' => 'raw',
                'value' => $model->status_kemah,
            ],
            [
                'attribute' => 'sumber_air',
                'format' => 'raw',
                'value' => $model->sumber_air,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Gunung Jalur Pos', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Gunung Jalur Pos', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
