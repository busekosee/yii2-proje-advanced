<?php
use yii\helpers\Url;
use backend\models\Menu;
use backend\controllers\SiteController;


$menuList = Menu::find()->all();
?>

<!DOCTYPE html>
<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>
  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Educenter - Education HTML Template</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Educenter HTML Template v1.0">

  <!-- theme meta -->
  <meta name="theme-name" content="educenter" />
</head>

<header class="fixed-top header">

  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a href="<?= Url::to(['site/index']) ?>">
          <img src="<?= Url::base(); ?>/images/logo/logo4.png" alt="logo">
        </a>

        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <?php
            $processedMenus = []; // İşlenen menülerin takip edildiği bir dizi
            foreach ($menuList as $menu):
              // Başlık daha önce işlendi mi kontrol ediyoruz
              if (in_array($menu->baslik, $processedMenus)) {
                continue; // Başlık zaten işlenmişse döngünün başına dön
              }

              // Aynı başlığa sahip menülerin alt menüleri
              $subMenuList = Menu::find()->where(['baslik' => $menu->baslik])->all();

              // Alt menü varsa ve başlık daha önce işlenmediyse
              if (!empty($subMenuList) && !in_array($menu->baslik, $processedMenus)):
                $processedMenus[] = $menu->baslik; // Başlığı işlendi olarak işaretliyoruz
                ?>

                <?php if ($menu->id == 1): // Başlık için id değeri 1 ise direkt site/index'e yönlendirme ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= Url::to(['site/index']) ?>"><?= $menu->baslik ?></a>
                </li>
              <?php else: // Alt menü varsa ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown<?= $menu->id ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $menu->baslik ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?= $menu->id ?>">
                    <?php foreach ($subMenuList as $submenu): ?>
                      <li><a class="dropdown-item" href="<?= Url::to(['site/menuicerik', 'id' => $submenu->id]) ?>"><?= $submenu->ıcerik ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endif; ?>

              <?php else: // Alt menü yoksa veya başlık daha önce işlendiyse
                $processedMenus[] = $menu->baslik; // Başlığı işlendi olarak işaretliyoruz
                $menuLink = ($menu->id == 1) ? Url::to(['site/index']) : Url::to(['site/menuicerik', 'id' => $menu->id]);
                ?>

                <li class="nav-item">
                  <a class="nav-link" href="<?= $menuLink ?>"><?= $menu->baslik ?></a>
                </li>

              <?php endif; ?>

            <?php endforeach; ?>
          </ul>
        </div>



      </nav>
    </div>
  </div>
</header>

<!-- ... -->

</html>



