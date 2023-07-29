<?php

namespace common\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
  public $username;
  public $email;
  public $password;

  public function rules()
  {
    return [
      ['username', 'trim'],
      ['username', 'required'],
      ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Bu kullanıcı adı zaten alınmış.'],
      ['username', 'string', 'min' => 2, 'max' => 255],

      ['email', 'trim'],
      ['email', 'required'],
      ['email', 'email'],
      ['email', 'string', 'max' => 255],
      ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Bu e-posta adresi zaten alınmış.'],

      ['password', 'required'],
      ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
    ];
  }

  public function signup()
  {
    if (!$this->validate()) {
      return false;
    }

    $user = new User();
    $user->username = $this->username;
    $user->email = $this->email;
    $user->setPassword($this->password);
    $user->generateAuthKey();
    $user->generateEmailVerificationToken();

    if ($user->save() && $this->sendEmail($user)) {
      return true;
    }

    return false;
  }


  protected function sendEmail($user)
  {
    return Yii::$app
      ->mailer
      ->compose(
        ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
        ['user' => $user]
      )
      ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
      ->setTo($this->email)
      ->setSubject('Account registration at ' . Yii::$app->name)
      ->send();
  }

}
