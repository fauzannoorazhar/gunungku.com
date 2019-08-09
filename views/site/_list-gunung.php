<?php

/* @var $model \app\models\Gunung */

?>

<div class="col-lg-4 col-md-6">
    <!-- feature -->
    <div class="feature-item">
        <div class="feature-pic set-bg" data-setbg="<?= $model->pathGambar ?>">
            <div class="<?= $model->labelStatus ?>"><?= $model->statusGunung ?></div>
        </div>
        <div class="feature-text">
            <div class="text-center feature-title">
                <h5><?= $model->nama ?></h5>
                <p><i class="fa fa-map-marker"></i> <?= $model->lokasi ?></p>
            </div>
            <div class="room-info-warp">
                <div class="room-info">
                    <div class="rf-left">
                        <p><i class="fa fa-cloud"></i> <?= @$model->ketinggianMdpl ?></p>
                        <p><i class="fa fa-map-signs"></i> <?= $model->countGunungJalur ?> Jalur Pendakian</p>
                    </div>
                    <div class="rf-right">
                        <p><i class="fa fa-calendar-check-o"></i> <?= $model->getCountKuotaJalur(date('Y-m-d')) ?> Kuota Pendakian</p>
                        <p><i class="fa fa-free-code-camp"></i> <?= $model->countJalurPos ?> Pos Pendakian</p>
                    </div>
                </div>
                <div class="room-info">
                    <div class="rf-left">
                        <p><i class="fa fa-user"></i> <?= @$model->userCreate->username ?></p>
                    </div>
                    <div class="rf-right">
                        <p><i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></p>
                    </div>
                </div>
            </div>
            <?= \yii\helpers\Html::a('Daftar Pendakian',['site/detail-gunung','slug' => $model->slug],['class' => 'room-price','target' => '_blank']) ?>
        </div>
    </div>
</div>
