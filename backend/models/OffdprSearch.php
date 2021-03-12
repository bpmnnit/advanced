<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Offdpr;

/**
 * OffdprSearch represents the model behind the search form of `backend\models\Offdpr`.
 */
class OffdprSearch extends Offdpr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offdpr_id', 'offdpr_sail_line', 'offdpr_sp_from', 'offdpr_sp_to', 'offdpr_preplot_sp_from', 'offdpr_preplot_sp_to', 'offdpr_shots', 'offdpr_bad_sp', 'offdpr_shots_acc', 'offdpr_cmps', 'offdpr_chargeable_infill'], 'integer'],
            [['offdpr_date', 'offdpr_streamer_profile', 'offdpr_line_no', 'offdpr_type', 'offdpr_remarks_line', 'offdpr_remarks_standby', 'offdpr_ntbp', 'offdpr_proj'], 'safe'],
            [['offdpr_direction', 'offdpr_prime', 'offdpr_infill', 'offdpr_chargeable_prime', 'offdpr_ros', 'offdpr_standbyhrs', 'offdpr_chargeable_standbyhrs'], 'number'],
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
        $query = Offdpr::find();

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

        $query->joinWith('offdprProj');

        // grid filtering conditions
        $query->andFilterWhere([
            'offdpr_id' => $this->offdpr_id,
            'offdpr_date' => $this->offdpr_date,
            'offdpr_sail_line' => $this->offdpr_sail_line,
            'offdpr_direction' => $this->offdpr_direction,
            'offdpr_sp_from' => $this->offdpr_sp_from,
            'offdpr_sp_to' => $this->offdpr_sp_to,
            'offdpr_preplot_sp_from' => $this->offdpr_preplot_sp_from,
            'offdpr_preplot_sp_to' => $this->offdpr_preplot_sp_to,
            'offdpr_shots' => $this->offdpr_shots,
            'offdpr_bad_sp' => $this->offdpr_bad_sp,
            'offdpr_shots_acc' => $this->offdpr_shots_acc,
            'offdpr_cmps' => $this->offdpr_cmps,
            'offdpr_prime' => $this->offdpr_prime,
            'offdpr_infill' => $this->offdpr_infill,
            'offdpr_chargeable_prime' => $this->offdpr_chargeable_prime,
            'offdpr_chargeable_infill' => $this->offdpr_chargeable_infill,
            'offdpr_ros' => $this->offdpr_ros,
            'offdpr_standbyhrs' => $this->offdpr_standbyhrs,
            'offdpr_chargeable_standbyhrs' => $this->offdpr_chargeable_standbyhrs,
        ]);

        $query->andFilterWhere(['like', 'offproj.offproj_contract', $this->offdpr_proj])
            ->andFilterWhere(['like', 'offdpr_streamer_profile', $this->offdpr_streamer_profile])
            ->andFilterWhere(['like', 'offdpr_line_no', $this->offdpr_line_no])
            ->andFilterWhere(['like', 'offdpr_type', $this->offdpr_type])
            ->andFilterWhere(['like', 'offdpr_remarks_line', $this->offdpr_remarks_line])
            ->andFilterWhere(['like', 'offdpr_remarks_standby', $this->offdpr_remarks_standby])
            ->andFilterWhere(['like', 'offdpr_ntbp', $this->offdpr_ntbp]);

        return $dataProvider;
    }
}
