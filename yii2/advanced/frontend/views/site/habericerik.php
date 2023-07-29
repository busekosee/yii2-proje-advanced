<?php

use backend\models\Haber;
use yii\helpers\Url;

// URL'den geçerli haberin ID'sini alalım
$id = Yii::$app->request->get('id');

// ID'ye göre ilgili haberi veritabanından alalım
$haber = Haber::findOne($id);

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
        <h2 class="section-title"><?= $haber->baslik ?></h2>
        <div class="about-text">
          <p><?= $haber->ıcerik ?></p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <img src="<?= Yii::getAlias('@web') ?>/haber/5.jpg" class="img-fluid" alt=""> <!-- Resim yolunu belirtin -->
      </div>
    </div>
  </div>
</section>


