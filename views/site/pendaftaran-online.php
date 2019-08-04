<?php

/* @var $searchModel \app\models\GunungSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $this yii\web\View */

$this->title = 'Pendaftaran Online';

?>

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/bg2.jpg">
    <div class="container text-white">
        <h2><?= $this->title ?></h2>
    </div>
</section>
<!--  Page top end -->

<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i>Home</a>
        <span><i class="fa fa-angle-right"></i><?= $this->title ?></span>
    </div>
</div>

<!-- page -->
<section class="page-section categories-page">
    <div class="container">
        <div class="row">
            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'pager' => [
                    'firstPageLabel' => 'first',
                    'lastPageLabel' => 'last',
                    'prevPageLabel' => 'previous',
                    'nextPageLabel' => 'next',
                ],
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_list-gunung',['model' => $model]);

                    // or just do some echo
                    // return $model->title . ' posted by ' . $model->author;
                },
            ]) ?>
        </div>
        <div class="site-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</section>
<!-- page end -->
