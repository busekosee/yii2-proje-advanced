<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/** @var yii\web\View $this */
/** @var backend\models\Form $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'baslik')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'icerik')->widget(CKEditor::className(), [
    'options' => ['rows' => 6],
    'preset' => 'custom', // veya 'basic', 'standard', 'full' - ihtiyacınıza bağlı
    'clientOptions' => [
      'filebrowserBrowseUrl' => '/kcfinder/browse.php?opener=ckeditor&type=files',
      'filebrowserImageBrowseUrl' => '/kcfinder/browse.php?opener=ckeditor&type=images',
      'filebrowserFlashBrowseUrl' => '/kcfinder/browse.php?opener=ckeditor&type=flash',
      'filebrowserUploadUrl' => '/kcfinder/upload.php?opener=ckeditor&type=files',
      'filebrowserImageUploadUrl' => '/kcfinder/upload.php?opener=ckeditor&type=images',
      'filebrowserFlashUploadUrl' => '/kcfinder/upload.php?opener=ckeditor&type=flash'
    ],
  ]) ?>

  <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
