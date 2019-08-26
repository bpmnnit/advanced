<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DailyProgressReports;

/**
 * DailyProgressReportsSearch represents the model behind the search form of `backend\models\DailyProgressReports`.
 */
class DailyProgressReportsSearch extends DailyProgressReports
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['daily_progress_report_id', 'daily_progress_report_survey', 'daily_progress_report_field_party', 'daily_progress_report_accepted_shots', 'daily_progress_report_rejected_shots', 'daily_progress_report_skipped_shots', 'daily_progress_report_repeated_shots'], 'integer'],
            [['daily_progress_report_date', 'daily_progress_report_instrument'], 'safe'],
            [['daily_progress_report_skm'], 'number'],
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
        $query = DailyProgressReports::find();

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
            'daily_progress_report_id' => $this->daily_progress_report_id,
            'daily_progress_report_survey' => $this->daily_progress_report_survey,
            'daily_progress_report_field_party' => $this->daily_progress_report_field_party,
            'daily_progress_report_date' => $this->daily_progress_report_date,
            'daily_progress_report_accepted_shots' => $this->daily_progress_report_accepted_shots,
            'daily_progress_report_rejected_shots' => $this->daily_progress_report_rejected_shots,
            'daily_progress_report_skipped_shots' => $this->daily_progress_report_skipped_shots,
            'daily_progress_report_repeated_shots' => $this->daily_progress_report_repeated_shots,
            'daily_progress_report_skm' => $this->daily_progress_report_skm,
        ]);

        $query->andFilterWhere(['like', 'daily_progress_report_instrument', $this->daily_progress_report_instrument]);

        return $dataProvider;
    }
}
