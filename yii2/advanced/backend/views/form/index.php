<?php

use backend\models\Form;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\models\FormSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Forms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a(Yii::t('app', 'Create Form'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'id',
      'baslik',
      'icerik:ntext',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, Form $model, $key, $index, $column) {
          return Url::toRoute([$action, 'id' => $model->id]);
        }
      ],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
