<?php

/* @var $gunungJalur \app\models\GunungJalur */

?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align: center; width: 55px;">No</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center; width: 150px;">Status Kemah</th>
            <th style="text-align: center; width: 150px;">Sumber Air</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($gunungJalur->manyGunungJalurPos as $pos) { ?>
            <?php /* @var $pos \app\models\GunungJalurPos */ ?>
            <tr>
                <td style="text-align: center"><?= $no++ ?></td>
                <td><?= $pos->nama ?></td>
                <td style="text-align: center"><?= $pos->iconStatusKemah ?></td>
                <td style="text-align: center"><?= $pos->iconSumberAir ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
