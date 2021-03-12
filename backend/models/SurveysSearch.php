<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Surveys;

/**
 * SurveysSearch represents the model behind the search form of `backend\models\Surveys`.
 */
class SurveysSearch extends Surveys
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['survey_id'], 'integer'],
            [['survey_sig', 'survey_name', 'survey_region', 'survey_field_party', 'survey_description', 'survey_shot_type', 'survey_acq_type', 'survey_area_name', 'survey_information', 'survey_onshore_offshore', 'survey_create_date'], 'safe'],
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
        $query = Surveys::find();

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

        $query->joinWith('surveyFieldParty');
        $query->joinWith('surveyRegion');

        // grid filtering conditions
        $query->andFilterWhere([
            'survey_id' => $this->survey_id,
        ]);

        $query->andFilterWhere(['like', 'survey_sig', $this->survey_sig])
            ->andFilterWhere(['like', 'survey_name', $this->survey_name])
            ->andFilterWhere(['like', 'survey_description', $this->survey_description])
            ->andFilterWhere(['like', 'survey_shot_type', $this->survey_shot_type])
            ->andFilterWhere(['like', 'survey_acq_type', $this->survey_acq_type])
            ->andFilterWhere(['like', 'survey_area_name', $this->survey_area_name])
            ->andFilterWhere(['like', 'survey_name', $this->survey_information])
            ->andFilterWhere(['like', 'survey_onshore_offshore', $this->survey_onshore_offshore])
            ->andFilterWhere(['like', 'survey_create_date', $this->survey_create_date])
            ->andFilterWhere(['like', 'field_parties.field_party_name', $this->survey_field_party])
            ->andFilterWhere(['like', 'regions.region_name', $this->survey_region]);

        return $dataProvider;
    }
}
