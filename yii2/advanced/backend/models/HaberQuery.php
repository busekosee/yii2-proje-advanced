<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Haber]].
 *
 * @see Haber
 */
class HaberQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Haber[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Haber|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
