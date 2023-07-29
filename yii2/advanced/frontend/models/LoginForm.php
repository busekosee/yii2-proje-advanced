<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
  public $username;
  public $password;
  public $rememberMe = true;

  private $_user;

  public function rules()
  {
    return [
      [['username', 'password'], 'required'],
      ['rememberMe', 'boolean'],
      ['password', 'validatePassword'],
    ];
  }

  public function validatePassword($attribute, $params)
  {
    if (!$this->hasErrors()) {
      $user = $this->getUser();
      if (!$user || !$user->validatePassword($this->password)) {
        $this->addError($attribute, 'Incorrect username or password.');
      }
    }
  }

  public function login()
  {
    if ($this->validate()) {
      return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
    }

    return false;
  }

  protected function getUser()
  {
    if ($this->_user === null) {
      $this->_user = User::findByUsername($this->username);
    }

    return $this->_user;
  }
}

