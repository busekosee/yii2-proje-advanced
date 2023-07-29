<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Form]].
 *
 * @see Form
 */
class FormQuery extends \yii\db\ActiveQuery
{
  /*public function active()
  {
      return $this->andWhere('[[status]]=1');
  }*/

  /**
   * {@inheritdoc}
   * @return Form[]|array
   */
  public function all($db = null)
  {
    return parent::all($db);
  }

  /**
   * {@inheritdoc}
   * @return Form|array|null
   */
  public function one($db = null)
  {
    return parent::one($db);
  }
}
