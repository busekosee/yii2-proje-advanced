<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%haber}}".
 *
 * @property int $id
 * @property string $ıcerik
 * @property string $olusturma_tarihi
 */
class Haber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%haber}}';
    }

    /**
     * {@inheritdoc}
     */
   public $upload_image;

  public $image_path; // this will hold the path of the saved file

  public function rules()
    {
        return [
           [['baslik', 'ıcerik', 'olusturma_tarihi'], 'required'],
            [['ıcerik'], 'string'],
            [['olusturma_tarihi'], 'safe'],
           [['baslik'], 'string', 'max' => 200],



        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ıcerik' => Yii::t('app', 'Icerik'),
            'baslik' => Yii::t('app', 'Baslik'),
            'olusturma_tarihi' => Yii::t('app', 'Olusturma Tarihi'),

        ];
    }

    /**
     * {@inheritdoc}
     * @return HaberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HaberQuery(get_called_class());
    }
  /**
   * {@inheritdoc}
   */
  /**
   * @var UploadedFile
   */


  public function upload()
  {
    if ($this->validate()) {
      $this->upload_image->saveAs(Yii::getAlias('@webroot') . '/uploads/' . $this->image_path->baseName . '.' . $this->image_path->extension);

      return true;
    } else {
      return false;
    }
  }


}
