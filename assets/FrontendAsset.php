<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/frontend.css',
        'css/animate.css',
        'css/owl.carousel.css',
        'css/style.css',
        'css/site.css'
    ];
    public $js = [
        /*'js/jquery-3.2.1.min.js',
        'js/bootstrap.min.js',*/
        'js/owl.carousel.min.js',
        'js/masonry.pkgd.min.js',
        'js/magnific-popup.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
    ];

}
