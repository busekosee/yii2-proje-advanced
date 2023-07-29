<?php
use backend\models\Form; // Form modelini ekleyin
use yii\helpers\Url;

// İlgili ID'lere sahip formları veritabanından çekin
$form1 = Form::findOne(['id' => 1]);
$form2 = Form::findOne(['id' => 2]);
$form3 = Form::findOne(['id' => 3]);
?>

<div class="col-sm-5 text-sm-right text-center" style="background-color: white;">
  <ul class="list-unstyled">
    <?php if ($form1): ?>
      <li class="mb-4">
        <a href="<?= Url::to(['site/formicerik', 'id' => $form1->id]) ?>">
          <img src="<?= Url::base(); ?>/images/logo/dünya.png" alt="logo">
          <h3><?= $form1->baslik ?></h3>
        </a>
      </li>
    <?php endif; ?>
    <?php if ($form2): ?>
      <li class="mb-4">
        <a href="<?= Url::to(['site/formicerik', 'id' => $form2->id]) ?>">
          <img src="<?= Url::base(); ?>/images/logo/indirlogo.png" alt="logo">
          <h3><?= $form2->baslik ?></h3>
        </a>
      </li>
    <?php endif; ?>
    <?php if ($form3): ?>
      <li class="mb-4">
        <a href="<?= Url::to(['site/formicerik', 'id' => $form3->id]) ?>">
          <img src="<?= Url::base(); ?>/images/logo/indirlogo.png" alt="logo">
          <h3><?= $form3->baslik ?></h3>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</div>

