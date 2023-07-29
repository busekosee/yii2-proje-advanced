<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\FormSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form-search">

  <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
      'data-pjax' => 1
    ],
  ]); ?>

  <?= $form->field($model, 'id') ?>

  <?= $form->field($model, 'baslik') ?>

  <?= $form->field($model, 'icerik') ?>

  <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
