<?php
use yii\helpers\Url;
use yii\helpers\Html;

// Diğer importlar...

use backend\models\User;

use backend\controllers\DuyuruController;

?>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

  <div class="sidebar-menu">


    <header class="logo-env">

      <!-- logo -->
      <div class="logo">
        <a href="index.html">
          <img src="assets/images/logo@2x.png" width="120" alt="" />
        </a>
      </div>

      <!-- logo collapse icon -->


      <div class="sidebar-collapse">
        <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
          <i class="entypo-menu"></i>
        </a>
      </div>



      <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
      <div class="sidebar-mobile-menu visible-xs">
        <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
          <i class="entypo-menu"></i>
        </a>
      </div>




    </header>
<ul id="main-menu" class="">
  <!-- add class "multiple-expanded" to allow multiple submenus to open -->
  <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
  <!-- Search Bar -->

  <li class="active opened active">
    <a href="index.html">

      <span>Dashboard</span>
    </a>
    <ul>

      <li>
        <a href="forms-main.html">
          <i class="entypo-doc-text"></i>
          <span>Duyuru</span>
        </a>
        <ul>
          <li>
            <a href="<?= url::to(['/duyuru/index']) ?>" > Duyurular </a>
          </li>

        </ul>
        <a href="forms-main.html">
          <i class="entypo-doc-text"></i>
          <span>Haber</span>
        </a>
        <ul>
          <li>
            <a href="<?= url::to(['/haber/index']) ?>" > Haberler </a>
          </li>

        </ul>
        <a href="forms-main.html">
          <i class="entypo-doc-text"></i>
          <span>Menu</span>
        </a>
        <ul>
          <li>
            <a href="<?= url::to(['/menu/index']) ?>" > Üst Menü </a>
          </li>

        </ul>
        <a href="forms-main.html">
          <i class="entypo-doc-text"></i>
          <span>AnasayfaForm</span>
        </a>
        <ul>
          <li>
            <a href="<?= url::to(['/form/index']) ?>" > Formlar</a>
          </li>

        </ul>
      </li>

    </ul>
  </li>

</ul>
</li>







  </ul>

  </div>
<div class="row">

  <!-- Profile Info and Notifications -->
  <div class="col-md-6 col-sm-8 clearfix">

    <ul class="user-info pull-left pull-none-xsm">

      <!-- Profile Info -->
      <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />

        </a>

        <ul class="dropdown-menu">

          <!-- Reverse Caret -->
          <li class="caret"></li>

          <!-- Profile sub-links -->
          <li>
            <a href="#">
              <i class="entypo-user"></i>
              Edit Profile
            </a>
          </li>


        </ul>
      </li>

    </ul>

    <ul class="user-info pull-left pull-right-xs pull-none-xsm">

      <!-- Raw Notifications -->
      <li class="notifications dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="entypo-attention"></i>
          <span class="badge badge-info">6</span>
        </a>

        <ul class="dropdown-menu">
          <li class="sep"></li>
          <?php if (Yii::$app->user->isGuest) : ?>
            <li>
              <a href="<?= Url::to(['site/login']) ?>">Login</a>
            </li>
          <?php else: ?>
            <li>
              <?= Html::beginForm(['site/logout'], 'post') ?>
              <?= Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']) ?>
              <?= Html::endForm() ?>
            </li>
          <?php endif; ?>
        </ul>

        </a>
      </li>
    </ul>
  </div>
</div>
</html>




      <!-- Raw Links -->
      <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">






        </ul>









    </ul>

  </div>


</div>
</div>
</body>
