<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \backend\models\LoginForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Giriş Yap';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-login">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Lütfen giriş bilgilerinizi girin:</p>

  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

  <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

  <?= $form->field($model, 'password')->passwordInput() ?>

  <?= $form->field($model, 'rememberMe')->checkbox() ?>

  <div class="form-group">
    <?= Html::submitButton('Giriş Yap', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
  </div>

  <?php ActiveForm::end(); ?>
</div>
