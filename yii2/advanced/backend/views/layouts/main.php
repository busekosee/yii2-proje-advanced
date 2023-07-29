<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use backend\assets\AppAsset;
use yii\bootstrap\ActiveFormAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

  <!DOCTYPE html>
  <html>
  <head>
    <!-- Head bölümü -->
    <title>My Website</title>
    <?php $this->head() ?>
  </head>
  <body>
  <?php $this->beginBody() ?>

  <!-- Header -->
  <?php echo $this->render('header'); ?>

  <!-- İçerik -->
  <?= Alert::widget() ?>
  <?= $content ?>


  <!-- Footer -->
  <?php echo $this->render('footer'); ?>






  <?php $this->endBody() ?>

  </body>
  </html>
<?php $this->endPage(); ?>
