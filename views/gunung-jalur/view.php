<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GunungJalur */

$this->title = "Detail Gunung Jalur";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gunung Jalur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gunung-jalur-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail Gunung Jalur</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id_gunung',
                'format' => 'raw',
                'value' => $model->gunung->nama,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'jarak_puncak',
                'format' => 'raw',
                'value' => $model->jarak_puncak,
            ],
            [
                'attribute' => 'jam_perjalanan',
                'format' => 'raw',
                'value' => $model->jam_perjalanan,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Gunung Jalur', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Gunung Jalur', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>


<?= $this->render('daftar-gunung-jalur-pos',['gunungJalur' => $model]) ?>
