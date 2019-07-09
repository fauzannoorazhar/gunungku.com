<?php

/* @var $model app\models\Pekerjaan */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Html Layout Email</title>
</head>
<body>
    <div>
            Kepada Yth,
        <br>
            <?= "Bapak/Ibu Pimpinan ".$model->penyedia->nama ?>
        <br>
            di tempat
        <br><br>
    </div>

    <div>
            Dengan Hormat,
        <br>
            Melalui surat elektronik ini kami ingin menginformasikan bahwa perusahaan Bapak/Ibu sudah dapat melakukan pengisian survei,
        berikut link untuk melakukan pengisian pada survei yang telah kami siapkan
        <br>
        <a href="<?= \yii\helpers\Url::to(['site/survei','id' => $model->id], true) ?>">
            Form <?= " ".@$model->survei->nama ?>
        </a>
    </div>

    <div>
            Demikian pemberitahuan ini kami sampaikan, atas perhatianya terima kasih.
        <br><br>
            Salah Hormat,
        <br><br><br>
            Admin Sistem Informasi Pengadaan - LAN RI
    </div>
</body>
