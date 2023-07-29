<?php
use backend\models\Duyuru;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\DuyuruSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Duyurular');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="duyuru-index">

  <h1 style="text-align: center; color: #337ab7;"><?= Html::encode($this->title) ?></h1>

  <p style="text-align: center;">
    <?= Html::a(Yii::t('app', 'Create Duyuru'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => "<div style='color: #337ab7; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>{items}\n{summary}\n{pager}</div>",
    'tableOptions' => [
      'class' => 'table table-hover',
    ],
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'id',
      'baslik',
      'ıcerik:ntext',
      'olusturma_tarihi',
      [
        'class' => ActionColumn::className(),
        'template' => '{view} {update} {delete}',
        'urlCreator' => function ($action, Duyuru $model, $key, $index, $column) {
          return Url::toRoute([$action, 'id' => $model->id]);
        }
      ],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
