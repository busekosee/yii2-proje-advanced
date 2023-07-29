<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[About]].
 *
 * @see About
 */
class AboutQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return About[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return About|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
