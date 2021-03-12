<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Manpowers;

/**
 * ManpowersSearch represents the model behind the search form of `backend\models\Manpowers`.
 */
class ManpowersSearch extends Manpowers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manpower_cpf'], 'integer'],
            [['manpower_name', 'manpower_charge', 'manpower_mobile_number', 'manpower_create_date', 'manpower_level', 'manpower_discipline', 'manpower_designation', 'manpower_crc'], 'safe'],
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
        $query = Manpowers::find();

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
          'manpower_cpf' => $this->manpower_cpf,
          'manpower_create_date' => $this->manpower_create_date,
        ]);

        $query->andFilterWhere(['like', 'manpower_name', $this->manpower_name])
          ->andFilterWhere(['like', 'manpower_charge', $this->manpower_charge])
          ->andFilterWhere(['like', 'manpower_mobile_number', $this->manpower_mobile_number])
          ->andFilterWhere(['like', 'manpower_level', $this->manpower_level])
          ->andFilterWhere(['like', 'manpower_discipline', $this->manpower_discipline])
          ->andFilterWhere(['like', 'manpower_designation', $this->manpower_designation])
          ->andFilterWhere(['like', 'manpower_crc', $this->manpower_crc]);

        return $dataProvider;
    }
}
