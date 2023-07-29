<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property int $auth_key
 * @property int $user_type
 * @property int $created_at
 * @property int $updated_at
 * @property string $password
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'password_reset_token', 'verification_token', 'email', 'auth_key', 'status', 'created_at', 'updated_at', 'password'], 'required'],
            [['auth_key', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'verification_token'], 'string', 'max' => 200],
            [['password_hash', 'email'], 'string', 'max' => 250],
            [['password_reset_token', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'email' => Yii::t('app', 'Email'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'user_type' => Yii::t('app', 'user_type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
  public static function findByAdminEmail($email)
  {
    return self::findOne([
      "email" => $email,
      "user_type" => "admin"
    ]);
  }

  public function adminLogin()
  {
    $user = $this->findByAdminEmail($this->email);
    if ($user && $this->validatePassword($user->password))
    {
      return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
    }else
    {
      $this->addError('password', 'Incorrect username or password.');
    }
  }

}
