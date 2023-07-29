<?php

namespace frontend\controllers;
use backend\models\About;
use backend\models\Duyuru;
use backend\models\Form;
use backend\models\Haber;
use backend\models\LoginForm;
use backend\models\Menu;
use backend\models\SubMenu;
use common\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
          'access' => [
            'class' => AccessControl::class,
            'only' => ['logout', 'yonetim'], // Sadece logout ve yonetim aksiyonları için filtre uygulanacak
            'rules' => [
              [
                'actions' => ['login'],
                'allow' => true,
                'roles' => ['?'], // Sadece giriş yapmamış kullanıcılar için izin ver
              ],
              [
                'actions' => ['logout', 'yonetim'],
                'allow' => true,
                'roles' => ['@'], // Giriş yapmış kullanıcılar için izin ver
              ],
            ],
          ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
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
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

  public function actionLogin()
  {

    // LoginForm modelini oluştur
    $model = new LoginForm();

    // Eğer POST isteği ile form gönderilmişse, formu yükle ve giriş işlemini dene
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      // Giriş başarılı, backend'e yönlendir
      return $this->redirect(['site/index']);
    }

    // Giriş başarısız veya ilk defa sayfayı gösteriyorsanız, login formunu render edin
    return $this->render('login', [
      'model' => $model,
    ]);

  }

  /**
   * Logs out the current user.
   *
   * @return mixed
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
      $about = About::find()->all(); // About modelinden tüm duyuruları çekiyoruz

      return $this->render('about', ['about' => $about]);

    }



// ...

  public function actionHaber($id)
  {
    $haber = Haber::findOne($id); // İlgili haberin id'sine göre haber modelini alın

    if (!$haber) {
      throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    return $this->render('haber', ['haber' => $haber]);
  }

  public function actionHabericerik()
  {
    $haber1 = Haber::find()->all(); // Haber modelinden tüm duyuruları çekiyoruz

    return $this->render('habericerik', ['habericerik' => $haber1]);
  }
  // Controller içerisinde
  public function actionDuyuruicerik($id)
  {
    $duyuru = Duyuru::findOne($id); // ID'ye göre ilgili duyuruyu çekiyoruz

    if ($duyuru === null) {
      throw new \yii\web\NotFoundHttpException('Duyuru bulunamadı.'); // Duyuru bulunamazsa 404 hatası döndürüyoruz
    }

    return $this->render('duyuruicerik', ['duyuru' => $duyuru]);
  }



  public function actionDuyurular()
   {
    $duyurular = Duyuru::find()->all(); // Duyuru modelinden tüm duyuruları çekiyoruz

     return $this->render('_duyurular', ['duyurular' => $duyurular]);

   }
  public function actionDuyurular1()
  {
    $duyurular1 = Duyuru::find()->all(); // Duyuru modelinden tüm duyuruları  liste görüntüsü için çekiyoruz

    return $this->render('tumduyuru', ['duyurular' => $duyurular1]);

  }
  public function actionFormicerik($id)
  {
    $form = Form::findOne($id); // ID'ye göre ilgili duyuruyu çekiyoruz

    if ($form === null) {
      throw new \yii\web\NotFoundHttpException('Duyuru bulunamadı.'); // Duyuru bulunamazsa 404 hatası döndürüyoruz
    }

    return $this->render('forumiceriki', ['forumiceriki' => $form]);
  }
  public function actionMenuicerik($id)
  {
    $menu = Menu::findOne($id);

    if ($menu === null) {
      throw new \yii\web\NotFoundHttpException('Menu bulunamadı.');
    }

    return $this->render('menualani', ['menualani' => $menu]);
  }



  public function actionNotice()
   {
    return $this->render('notice');
   }
    /**
     * Signs user up.
     *
     * @return mixed
     */


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionSignup()
  {
    $model = new SignupForm();

    if ($model->load(Yii::$app->request->post()) && $model->signup()) {
      Yii::$app->session->setFlash('success', 'Kayıt işlemi başarılı! Lütfen giriş yapın.');
      return $this->redirect(Url::to(['/site/login'])); // Kullanıcıyı giriş sayfasına yönlendirir
    }

    return $this->render('signup', [
      'model' => $model,
    ]);
  }

}
