<?php

/* @var $gunung \app\models\Gunung */

?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">
            Daftar Jalur
        </h3>
    </div>
    <div class="box-header">
        <?= \yii\helpers\Html::a('<i class="fa fa-plus"></i> Tambah Jalur',['gunung-jalur/create','id_gunung' => $gunung->id],['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 50px;">No</th>
                        <th class="text-center" style="vertical-align: middle;">Nama Jalur</th>
                        <th class="text-center" style="vertical-align: middle; width: 150px;">Jarak Puncak (km)</th>
                        <th class="text-center" style="vertical-align: middle; width: 150px;">Waktu Tempuh (jam)</th>
                        <th class="text-center" style="vertical-align: middle; width: 150px;">Jumlah <br> Pos</th>
                        <th class="text-center" style="vertical-align: middle; width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($gunung->manyGunungJalur as $gunungJalur) { ?>
                    <?php /* @var $gunungJalur \app\models\GunungJalur */ ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $gunungJalur->nama ?></td>
                            <td class="text-center"><?= $gunungJalur->jarak_puncak ?></td>
                            <td class="text-center"><?= $gunungJalur->jam_perjalanan ?></td>
                            <td class="text-center"><?= $gunungJalur->countGunungJalurPos ?></td>
                            <td class="text-center">
                                <?= \yii\helpers\Html::a('<i class="fa fa-eye"></i>',['gunung-jalur/view','id' => $gunungJalur->id]) ?>
                                <?= \yii\helpers\Html::a('<i class="fa fa-pencil"></i>',['gunung-jalur/update','id' => $gunungJalur->id]) ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
