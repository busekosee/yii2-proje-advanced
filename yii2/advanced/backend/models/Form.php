<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%form}}".
 *
 * @property int $id
 * @property string $baslik
 * @property string $icerik
 */
class Form extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%form}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['baslik', 'icerik'], 'required'],
      [['icerik'], 'string'],
      [['baslik'], 'string', 'max' => 30],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('app', 'ID'),
      'baslik' => Yii::t('app', 'Baslik'),
      'icerik' => Yii::t('app', 'Icerik'),
    ];
  }

  /**
   * {@inheritdoc}
   * @return FormQuery the active query used by this AR class.
   */
  public static function find()
  {
    return new FormQuery(get_called_class());
  }
}
