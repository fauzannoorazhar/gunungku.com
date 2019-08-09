<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
app\assets\FrontendAsset::register($this);
$tooltip = <<< SCRIPT
        $('body').tooltip({
            selector: '[data-toggle="tooltip"]'
        });       
SCRIPT;
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

<?= $this->render('header-section') ?>

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
