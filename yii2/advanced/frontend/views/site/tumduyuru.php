<?php
use backend\models\Duyuru; // Duyuru modelini ekleyin
use yii\helpers\Url;

// Duyuruları veritabanından çekin
$duyurular1 = Duyuru::find()->all();
?>

<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="notice.html">Tüm</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Duyurular</li>
        </ul>

      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- notice details -->

<section class="section">

  <div class="container">

    <div class="row">
      <?php foreach ($duyurular1 as $duyuru): ?>
        <div class="row">
          <div class="col-12">
            <div class="d-flex">
              <div class="text-center mr-4">
                <div class="p-4 bg-primary text-white">
                  <span class="h2 d-block"><?= $duyuru->olusturma_tarihi ?></span>
                </div>
              </div>
              <br>
              <!-- notice content -->
              <div>
                <br>

                <h3 class="mb-4"><?= $duyuru->baslik ?></h3>

                <a href="<?= \yii\helpers\Url::to(['site/duyuruicerik', 'id' => $duyuru->id]) ?>">Daha fazla</a>

              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<br>
<br>

