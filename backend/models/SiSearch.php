<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Si;

/**
 * SiSearch represents the model behind the search form of `backend\models\Si`.
 */
class SiSearch extends Si
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['si_id', 'si_sps', 'si_record_length', 'si_total_shot'], 'integer'],
            [['si_no', 'si_area', 'si_fp', 'si_objective', 'si_depth_zoi', 'si_time_zoi', 'si_acq_type', 'si_qow', 'si_source_type', 'si_spread_type', 'si_bin_size', 'si_norl', 'si_rpl', 'si_tac', 'si_fold', 'si_swath_rollover', 'si_rec_line_bearing', 'si_rec_inst', 'si_rec_format', 'si_sensor', 'si_field_season', 'si_on_off', 'si_start_date', 'si_end_date', 'si_region', 'si_basin'], 'safe'],
            [['si_gi', 'si_si', 'si_rli', 'si_sli', 'si_min_min_offset', 'si_min_max_offset', 'si_max_min_offset', 'si_max_max_offset', 'si_ar', 'si_conversion_factor', 'si_sample_rate'], 'number'],
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
        $query = Si::find();

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

        $query->joinWith('siBasin');
        $query->joinWith('siRegion');
        $query->joinWith('siFp');

        // grid filtering conditions
        $query->andFilterWhere([
            'si_id' => $this->si_id,
            //'si_basin' => $this->si_basin,
            //'si_region' => $this->si_region,
            'si_gi' => $this->si_gi,
            'si_si' => $this->si_si,
            'si_rli' => $this->si_rli,
            'si_sli' => $this->si_sli,
            'si_sps' => $this->si_sps,
            'si_min_min_offset' => $this->si_min_min_offset,
            'si_min_max_offset' => $this->si_min_max_offset,
            'si_max_min_offset' => $this->si_max_min_offset,
            'si_max_max_offset' => $this->si_max_max_offset,
            'si_ar' => $this->si_ar,
            'si_conversion_factor' => $this->si_conversion_factor,
            'si_mgh'=> $this->si_mgh,
            'si_total_shot' => $this->si_total_shot,
            'si_record_length' => $this->si_record_length,
            'si_sample_rate' => $this->si_sample_rate,
            'si_start_date' => $this->si_start_date,
            'si_end_date' => $this->si_end_date,
        ]);

        $query->andFilterWhere(['like', 'si_no', $this->si_no])
            ->andFilterWhere(['like', 'si_area', $this->si_area])
            ->andFilterWhere(['like', 'si_objective', $this->si_objective])
            ->andFilterWhere(['like', 'si_depth_zoi', $this->si_depth_zoi])
            ->andFilterWhere(['like', 'si_time_zoi', $this->si_time_zoi])
            ->andFilterWhere(['like', 'si_acq_type', $this->si_acq_type])
            ->andFilterWhere(['like', 'si_qow', $this->si_qow])
            ->andFilterWhere(['like', 'si_source_type', $this->si_source_type])
            ->andFilterWhere(['like', 'si_spread_type', $this->si_spread_type])
            ->andFilterWhere(['like', 'si_bin_size', $this->si_bin_size])
            ->andFilterWhere(['like', 'si_norl', $this->si_norl])
            ->andFilterWhere(['like', 'si_rpl', $this->si_rpl])
            ->andFilterWhere(['like', 'si_tac', $this->si_tac])
            ->andFilterWhere(['like', 'si_fold', $this->si_fold])
            ->andFilterWhere(['like', 'si_swath_rollover', $this->si_swath_rollover])
            ->andFilterWhere(['like', 'si_rec_line_bearing', $this->si_rec_line_bearing])
            ->andFilterWhere(['like', 'si_rec_inst', $this->si_rec_inst])
            ->andFilterWhere(['like', 'si_rec_format', $this->si_rec_format])
            ->andFilterWhere(['like', 'si_sensor', $this->si_sensor])
            ->andFilterWhere(['like', 'si_field_season', $this->si_field_season])
            ->andFilterWhere(['like', 'si_on_off', $this->si_on_off]);

            
        $query->andFilterWhere(['like', 'basin_india.basin_india_name', $this->si_basin])
            ->andFilterWhere(['like', 'regions.region_name', $this->si_region])
            ->andFilterWhere(['like', 'field_parties.field_party_name', $this->si_fp]);

        return $dataProvider;
    }
}
