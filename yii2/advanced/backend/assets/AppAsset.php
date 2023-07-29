<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'assets/css/font-icons/entypo/css/entypo.css',
      'assets/css/bootstrap.css',
     'assets/css/neon-core.css',
     'assets/css/neon-theme.css',
     'assets/css/neon-forms.css',
      'assets/css/custom.css',
     'assets/js/jvectormap/jquery-jvectormap-1.2.2.css',
     'assets/js/rickshaw/rickshaw.min.css',
      'css/style.css',


    ];
    public $js = [
      'assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css',
      'assets/js/jquery-1.11.0.min.js',
       'assets/js/ie8-responsive-file-warning.js',
       'assets/js/gsap/main-gsap.js',
       'assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js',
       'assets/js/bootstrap.js',
       'assets/js/joinable.js',
       'assets/js/resizeable.js',
       'assets/js/neon-api.js',
       'assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js',
       'assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js',
       'assets/js/jquery.sparkline.min.js',
       'assets/js/rickshaw/vendor/d3.v3.js',
       'assets/js/rickshaw/rickshaw.min.js',
       'assets/js/raphael-min.js',
       'assets/js/morris.min.js',
       'assets/js/toastr.js',
       'assets/js/neon-chat.js',
       'assets/js/neon-custom.js',
       'assets/js/neon-demo.js',
       'js/script.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
