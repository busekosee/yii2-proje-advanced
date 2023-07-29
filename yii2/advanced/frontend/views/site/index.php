<?php
use yii\helpers\Url;
?>
<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="images/banner/banner-1.jpg">
  <div class="container">
    <?= $this->render('_slider'); ?>
  </div>
</section>
<!-- /hero slider -->
<!-- banner-feature -->
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <?= $this->render('_duyurular'); ?>
  </div>
</section>
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <?= $this->render('haber'); ?>
  </div>
</section>
<section class="bg-gray overflow-md-hidden">
  <div class="container">
    <?= $this->render('forum'); ?>
  </div>
</section>
