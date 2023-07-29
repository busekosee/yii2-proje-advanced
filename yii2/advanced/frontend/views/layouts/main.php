<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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

<!-- Sidebar -->


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage(); ?>
