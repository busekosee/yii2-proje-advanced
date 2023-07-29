<?php

namespace backend\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property int $id
 * @property string $ıcerik
 * @property string $baslik
 * @property int $ust_menu_id
 * @property int $menu_sira
 * @property string $menu_icerik
 * @property string $icerik
 */


class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['baslik', 'ıcerik', 'ust_menu_id', 'menu_sira', 'menu_icerik', 'icerik'], 'required'],
            [['ıcerik', 'baslik'], 'required'],
            [['ıcerik'], 'string'],
            [['baslik'], 'string', 'max' => 250],
            [['ust_menu_id', 'menu_sira'], 'integer'],
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
          'ust_menu_id' => Yii::t('app', 'Ust Menu ID'),
          'menu_sira' => Yii::t('app', 'Menu Sira'),
          'menu_icerik' => Yii::t('app', 'Menu Icerik'),
          'icerik' => Yii::t('app', 'Icerik'),

        ];
    }

    /**
     * {@inheritdoc}
     * @return MeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MeQuery(get_called_class());
    }
}
