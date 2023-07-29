<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%duyuru}}".
 *
 * @property int $id
 * @property string $baslik
 * @property string $ıcerik
 * @property string $olusturma_tarihi
 */
class Duyuru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%duyuru}}';
    }

    /**
     * {@inheritdoc}
     */
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
            'baslik' => Yii::t('app', 'Baslik'),
            'ıcerik' => Yii::t('app', 'Icerik'),
            'olusturma_tarihi' => Yii::t('app', 'Olusturma Tarihi'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DuyuruQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DuyuruQuery(get_called_class());
    }
}
