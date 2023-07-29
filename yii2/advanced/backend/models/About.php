<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%about}}".
 *
 * @property int $id
 * @property string $hakkında
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%about}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hakkında'], 'required'],
            [['hakkında'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hakkında' => Yii::t('app', 'Hakkında'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AboutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AboutQuery(get_called_class());
    }
}
