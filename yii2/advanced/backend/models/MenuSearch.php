<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Menu;

/**
 * MenuSearch represents the model behind the search form of `backend\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ust_menu_id', 'menu_sira'], 'integer'],
            [['baslik', 'ıcerik', 'menu_icerik'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Menu::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ust_menu_id' => $this->ust_menu_id,
            'menu_sira' => $this->menu_sira,
        ]);

        $query->andFilterWhere(['like', 'baslik', $this->baslik])
            ->andFilterWhere(['like', 'ıcerik', $this->ıcerik])
            ->andFilterWhere(['like', 'menu_icerik', $this->menu_icerik]);

        return $dataProvider;
    }
}
