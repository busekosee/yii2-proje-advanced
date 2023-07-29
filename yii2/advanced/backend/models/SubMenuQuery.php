<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SubMenu]].
 *
 * @see SubMenu
 */
class SubMenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SubMenu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SubMenu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
