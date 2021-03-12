<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BasinIndia;

/**
 * BasinIndiaSearch represents the model behind the search form of `backend\models\BasinIndia`.
 */
class BasinIndiaSearch extends BasinIndia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbasin_india'], 'integer'],
            [['basin_india_name', 'basin_india_type'], 'safe'],
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
        $query = BasinIndia::find();

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
            'idbasin_india' => $this->idbasin_india,
        ]);

        $query->andFilterWhere(['like', 'basin_india_name', $this->basin_india_name])
            ->andFilterWhere(['like', 'basin_india_type', $this->basin_india_type]);

        return $dataProvider;
    }
}
