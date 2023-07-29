<?php

namespace backend\controllers;

use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use backend\models\LoginForm;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
  public function behaviors() {

    return [

      'access' => [
        'class' => AccessControl::className(),
        'only' => ['site/login', 'index','create', 'update','delete'],
        'rules' => [
          [
            'allow' => true,
            'actions' => ['site/login'],
            'roles' => ['?'],
          ],
          [
            'allow' => true,
            'actions' => ['index','create', 'update','delete'],
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
    ];
  }
  /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

  public function actionLogout()
  {
    Yii::$app->user->logout();

    // Çıkış yaptıktan sonra frontenddeki login sayfasına yönlendir
    return $this->redirect(\yii\helpers\Url::to(['site/login'], true));
  }
  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    } else {
      $model->password = '';
      return $this->render('login', [
        'model' => $model,
      ]);
    }
  }
}
