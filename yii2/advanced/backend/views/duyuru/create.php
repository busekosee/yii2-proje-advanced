<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Duyuru $model */

$this->title = Yii::t('app', 'Create Duyuru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Duyurus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
