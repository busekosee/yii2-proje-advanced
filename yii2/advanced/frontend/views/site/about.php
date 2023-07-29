<?php

use backend\models\About; // Eksik olan satır

use yii\helpers\Url;

$abouts = About::find()->all();

?>

<!-- Content Section -->
<section class="about py-5">
  <div class="container">
    <div class="row">
      <?php foreach ($abouts as $about): ?>
        <div class="col-lg-6 col-md-6 col-12">
          <br>
          <br>
          <br>
          <br>
          <br>
          <h2 class="section-title">Hakkımızda</h2>
          <div class="about-text">
            <p></p>
            <p><br><?= $about->hakkında ?>.</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <img src="images/about.jpg" class="img-fluid" alt="">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
