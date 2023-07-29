<?php
use backend\models\Menu;
use yii\helpers\Url;

$menuId = Yii::$app->request->get('id');
$menu = Menu::findOne($menuId);

?>

<!-- Content Section -->
<section class="about py-5">
  <div class="container">
    <div class="row">
      <?php if ($menu): ?>
        <div class="col-lg-6 col-md-6 col-12">
          <br>
          <br>
          <br>
          <br>
          <br>
          <h2 class="section-title"><?= $menu->ıcerik ?></h2>
          <div class="about-text">
            <p></p>
            <p><br><?= $menu->menu_icerik ?></p>
            <p><br><?= $menu->icerik ?></p><!-- Burada menü içeriğini gösteriyoruz -->
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <img src="images/about.jpg" class="img-fluid" alt="">
        </div>
      <?php else: ?>
        <div class="col-12">
          <p>Belirtilen menü bulunamadı.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
