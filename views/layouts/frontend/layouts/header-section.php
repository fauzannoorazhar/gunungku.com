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
                        <a href="<?= \yii\helpers\Url::to(['site/registrasi']) ?>"><i class="fa fa-user-circle-o"></i> Registrasi</a>
                        <?php if (Yii::$app->user->isGuest) { ?>
                            <a href="<?= \yii\helpers\Url::to(['site/login']) ?>"><i class="fa fa-sign-in"></i> Login</a>
                        <?php } else { ?>
                            <a href="<?= \yii\helpers\Url::to(['site/login']) ?>"><i class="fa fa-dashboard"></i> Halaman Admin</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-left: 2%; margin-right: 2%;">
            <div class="col-12">
                <div class="site-navbar">
                    <a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="site-logo"><img src="img/logo-pendakigunung.png" alt=""></a>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                    <ul class="main-menu">
                        <li><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Beranda</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['site/pendaftaran-online']) ?>">Pendaftaran Online</a></li>
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
