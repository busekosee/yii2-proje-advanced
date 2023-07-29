<?php

use backend\models\Duyuru;
use yii\helpers\Url;

// URL'den geçerli haberin ID'sini alalım
$id = Yii::$app->request->get('id');

// ID'ye göre ilgili haberi veritabanından alalım
$duyuru = Duyuru::findOne($id);

?>
<!-- Content Section -->
<section class="about py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h3 class="mb-4"><?= $duyuru->baslik ?></h3>
        <div class="about-text">
          <p><?= $duyuru->ıcerik ?></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <img src="images/about.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>
