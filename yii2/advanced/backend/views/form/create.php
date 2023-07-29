<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Form $model */

$this->title = Yii::t('app', 'Create Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-create">

  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
