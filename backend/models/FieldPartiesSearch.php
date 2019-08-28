<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FieldParties;

/**
 * FieldPartiesSearch represents the model behind the search form of `backend\models\FieldParties`.
 */
class FieldPartiesSearch extends FieldParties
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_party_id'], 'integer'],
            [['field_party_name', 'field_party_type', 'field_party_create_date', 'field_party_region', 'field_party_chief'], 'safe'],
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
        $query = FieldParties::find();

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

        $query->joinWith('fieldPartyChief');
        $query->joinWith('fieldPartyRegion');

        // grid filtering conditions
        $query->andFilterWhere([
            'field_party_id' => $this->field_party_id,
            'field_party_create_date' => $this->field_party_create_date,
        ]);

        $query->andFilterWhere(['like', 'field_party_name', $this->field_party_name])
            ->andFilterWhere(['like', 'field_party_type', $this->field_party_type])
            ->andFilterWhere(['like', 'manpowers.manpower_name', $this->field_party_chief])
            ->andFilterWhere(['like', 'regions.region_name', $this->field_party_region]);

        return $dataProvider;
    }
}
