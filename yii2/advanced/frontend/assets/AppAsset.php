<?php

namespace app\assets;
namespace frontend\assets;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  //public $sourcePath='@bower';
  public $css = [
    'plugins/bootstrap/bootstrap.min.css',
    'plugins/slick/slick.css',
    'plugins/themify-icons/themify-icons.css',
    'plugins/animate/animate.css',
    'plugins/aos/aos.css',
    'plugins/venobox/venobox.css',
    'css/style.css',

  ];
  public $js = [

    'plugins/jQuery/jquery.min.js',
    'plugins/bootstrap/bootstrap.min.js',
    'plugins/slick/slick.min.js',
    'plugins/aos/aos.js',
    'plugins/venobox/venobox.min.js',
    'plugins/filterizr/jquery.filterizr.min.js',
    'plugins/google-map/gmap.js',
    'js/script.js',
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap5\BootstrapAsset',
  ];


}
