<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Offproj;

/**
 * OffprojSearch represents the model behind the search form of `backend\models\Offproj`.
 */
class OffprojSearch extends Offproj
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offproj_id', 'offproj_source_interval', 'offproj_sail_line_interval', 'offproj_streamer_length', 'offproj_shot_point_interval', 'offproj_source_array', 'offproj_streamers', 'offproj_record_length', 'offproj_planned_completion_days'], 'integer'],
            [['offproj_area', 'offproj_contract', 'offproj_vessel', 'offproj_contractor', 'offproj_start_date', 'offproj_end_date', 'offproj_mob_start_date', 'offproj_mob_end_date', 'offproj_prefix', 'offproj_streamer_profile'], 'safe'],
            [['offproj_volume', 'offproj_receiver_interval', 'offproj_prime', 'offproj_infill_cap', 'offproj_direction_x', 'offproj_direction_y'], 'number'],
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
        $query = Offproj::find();

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
            'offproj_id' => $this->offproj_id,
            'offproj_start_date' => $this->offproj_start_date,
            'offproj_end_date' => $this->offproj_end_date,
            'offproj_mob_start_date' => $this->offproj_mob_start_date,
            'offproj_mob_end_date' => $this->offproj_mob_end_date,
            'offproj_volume' => $this->offproj_volume,
            'offproj_source_interval' => $this->offproj_source_interval,
            'offproj_sail_line_interval' => $this->offproj_sail_line_interval,
            'offproj_streamer_length' => $this->offproj_streamer_length,
            'offproj_receiver_interval' => $this->offproj_receiver_interval,
            'offproj_shot_point_interval' => $this->offproj_shot_point_interval,
            'offproj_source_array' => $this->offproj_source_array,
            'offproj_streamers' => $this->offproj_streamers,
            'offproj_record_length' => $this->offproj_record_length,
            'offproj_prime' => $this->offproj_prime,
            'offproj_infill_cap' => $this->offproj_infill_cap,
            'offproj_direction_x' => $this->offproj_direction_x,
            'offproj_direction_y' => $this->offproj_direction_y,
            'offproj_planned_completion_days' => $this->offproj_planned_completion_days,
        ]);

        $query->andFilterWhere(['like', 'offproj_area', $this->offproj_area])
            ->andFilterWhere(['like', 'offproj_contract', $this->offproj_contract])
            ->andFilterWhere(['like', 'offproj_vessel', $this->offproj_vessel])
            ->andFilterWhere(['like', 'offproj_contractor', $this->offproj_contractor])
            ->andFilterWhere(['like', 'offproj_prefix', $this->offproj_prefix])
            ->andFilterWhere(['like', 'offproj_streamer_profile', $this->offproj_streamer_profile]);

        return $dataProvider;
    }
}
