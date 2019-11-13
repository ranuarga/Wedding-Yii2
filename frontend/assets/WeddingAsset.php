<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class WeddingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'wedding/css/style.css',
        'wedding/css/owl.carousel.css',
        'wedding/css/owl.theme.css',
        'wedding/css/owl.transitions.css',
        'wedding/css/flaticon.html',
        'wedding/css/jquery-ui.css',
        'https://use.fontawesome.com/releases/v5.8.2/css/all.css',
        'wedding/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Montserrat:400,700',
        'https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300italic,300',        
    ];
    public $js = [
        'wedding/js/bootstrap.min.js',
        'wedding/js/jquery.flexnav.js',
        'wedding/js/navigation.js',
        'wedding/js/bootstrap-select.js',
        'wedding/js/owl.carousel.min.js',
        'wedding/js/slider.js',
        'wedding/js/jquery.sticky.js',
        'wedding/js/header-sticky.js',
        'wedding/js/jquery-ui.js',
        'wedding/js/price-slider.js',
        'wedding/js/date-script.js',
        'wedding/js/jquery.circlechart.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
