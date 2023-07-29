<?php
use backend\models\Haber;
use yii\helpers\Url;
$haber = Haber::find()->all();
?>

<div class="col-lg-6 col-md-6 col-12">
  <br>
  <br>
  <br>
  <br>
  <br>
  <h2 class="section-title">Haberler</h2>
  <div class="about-text">
    <section class="section">
      <div class="container">
        <div class="row">
          <?php foreach ($haber as $haber): ?>
            <div class="col-lg-4 col-sm-6 mb-5">
              <div class="card border-0 rounded-0 hover-shadow">
                <div class="card-img position-relative">
                  <img class="card-img-top rounded-0" src="images/events/event-1.jpg" alt="event thumb">
                  <div class="card-date"><?= $haber->olusturma_tarihi ?></div>
                </div>
                <div class="card-body">
                  <p><i class="ti-location-pin text-primary mr-2"></i><?= $haber->baslik ?></p>
                  <a href="<?= Url::to(['site/habericerik', 'id' => $haber->id]) ?>">
                    <img class="img-fluid w-100" src="<?= Url::base(); ?>$haber->resim" alt="haber resim">

                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</div>
