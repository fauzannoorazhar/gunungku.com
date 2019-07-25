<?php

/* @var $gunungJalur \app\models\GunungJalur */

?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">
            Daftar Pos
        </h3>
    </div>
    <div class="box-header">
        <?= \yii\helpers\Html::a('<i class="fa fa-plus"></i> Tambah Pos',['gunung-jalur-pos/create','id_gunung_jalur' => $gunungJalur->id],['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-bordered">
                <thead>
                <tr>
                    <th class="text-center" style="vertical-align: middle; width: 50px;">No</th>
                    <th class="text-center" style="vertical-align: middle;">Nama Pos</th>
                    <th class="text-center" style="vertical-align: middle; width: 130px;">Status Kemah</th>
                    <th class="text-center" style="vertical-align: middle; width: 130px;">Sumber Air</th>
                    <th class="text-center" style="vertical-align: middle; width: 75px;"></th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($gunungJalur->manyGunungJalurPos as $pos) { ?>
                    <?php /* @var $pos \app\models\GunungJalurPos */ ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $pos->nama ?></td>
                            <td class="text-center"><?= $pos->iconStatusKemah ?></td>
                            <td class="text-center"><?= $pos->iconSumberAir ?></td>
                            <td class="text-center">
                                <?= \yii\helpers\Html::a('<i class="fa fa-eye"></i>',['gunung-jalur-pos/view','id' => $pos->id]) ?>
                                <?= \yii\helpers\Html::a('<i class="fa fa-pencil"></i>',['gunung-jalur-pos/update','id' => $pos->id]) ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
