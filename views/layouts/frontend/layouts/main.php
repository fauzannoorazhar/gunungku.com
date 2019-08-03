<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
app\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 header-top-left">
                        <div class="top-info">
                            <i class="fa fa-phone"></i>
                            (+62) 666 121 4321
                        </div>
                        <div class="top-info">
                            <i class="fa fa-envelope"></i>
                            info.pendakigunung@gmail.com
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-right header-top-right text-right">
                        <div class="top-social">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <!--<a href=""><i class="fa fa-pinterest"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>-->
                        </div>
                        <div class="panel-user">
                            <a href=""><i class="fa fa-user-circle-o"></i> Register</a>
                            <a href="<?= \yii\helpers\Url::to(['site/login']) ?>"><i class="fa fa-sign-in"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="margin-left: 2%; margin-right: 2%;">
                <div class="col-12">
                    <div class="site-navbar">
                        <a href="#" class="site-logo"><img src="img/logo-pendakigunung.png" alt=""></a>
                        <div class="nav-switch">
                            <i class="fa fa-bars"></i>
                        </div>
                        <ul class="main-menu">
                            <li><a href="index.html">Beranda</a></li>
                            <li><a href="categories.html">Pendaftaran Online</a></li>
                            <li><a href="blog.html">Berita</a></li>
                            <li><a href="about.html">Tentang Kami</a></li>
                            <!--<li><a href="single-list.html">Pages</a></li>-->
                            <li><a href="contact.html">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header section end -->

    <!-- Hero section -->
    <section class="hero-section set-bg" data-setbg="img/bg2.jpg">
        <div class="container hero-text text-white">
            <h2><?= Yii::t('app','temukan petualangan gunung anda disini') ?></h2>
            <p><i><?= Yii::t('app','"Petualangan hanyalah tentang kerendahan hati, <br> bukan tentang harga atau pembuktian diri"') ?></i></p>
            <a href="#" class="site-btn"><?= Yii::t('app','LIHAT DAFTAR GUNUNG') ?></a>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Filter form section -->
    <div class="filter-search">
        <div class="container">
            <form class="filter-form">
                <input type="text" placeholder="Enter a street name, address number or keyword">
                <select>
                    <option value="City">City</option>
                </select>
                <select>
                    <option value="City">State</option>
                </select>
                <button class="site-btn fs-submit">SEARCH</button>
            </form>
        </div>
    </div>
    <!-- Filter form section end -->

    <?= $content ?>

    <?php //$content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script>
    $('.set-bg').each(function() {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });
</script>
