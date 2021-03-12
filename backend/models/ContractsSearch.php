<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contracts;

/**
 * ContractsSearch represents the model behind the search form of `backend\models\Contracts`.
 */
class ContractsSearch extends Contracts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contract_region', 'contract_awarded_value', 'contract_quantum'], 'integer'],
            [['contract_field_season', 'contract_tender_number', 'contract_tender_type', 'contract_survey_type', 'contract_description', 'contract_area', 'contract_basin', 'contract_block', 'contract_contactor', 'contract_start_date', 'contract_end_date', 'contract_remarks'], 'safe'],
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
        $query = Contracts::find();

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
            'contract_id' => $this->contract_id,
            'contract_region' => $this->contract_region,
            'contract_start_date' => $this->contract_start_date,
            'contract_end_date' => $this->contract_end_date,
        ]);

        $query->andFilterWhere(['like', 'contract_field_season', $this->contract_field_season])
            ->andFilterWhere(['like', 'contract_tender_number', $this->contract_tender_number])
            ->andFilterWhere(['like', 'contract_tender_type', $this->contract_tender_type])
            ->andFilterWhere(['like', 'contract_survey_type', $this->contract_survey_type])
            ->andFilterWhere(['like', 'contract_description', $this->contract_description])
            ->andFilterWhere(['like', 'contract_area', $this->contract_area])
            ->andFilterWhere(['like', 'contract_basin', $this->contract_basin])
            ->andFilterWhere(['like', 'contract_block', $this->contract_block])
            ->andFilterWhere(['like', 'contract_contactor', $this->contract_contactor])
            ->andFilterWhere(['like', 'contract_awarded_value', $this->contract_awarded_value])
            ->andFilterWhere(['like', 'contract_remarks', $this->contract_remarks]);

        return $dataProvider;
    }
}
