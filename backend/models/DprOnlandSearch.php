<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DprOnland;

/**
 * DprOnlandSearch represents the model behind the search form of `backend\models\DprOnland`.
 */
class DprOnlandSearch extends DprOnland
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dpr_id', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rec', 'dpr_shots_rep'], 'integer'],
            [['dpr_date', 'dpr_area', 'dpr_shot_type', 'dpr_acq_type', 'dpr_field_party'], 'safe'],
            [['dpr_conv_factor', 'dpr_coverage'], 'number'],
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
        $query = DprOnland::find();

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

        $query->joinWith('dprFieldParty');

        // grid filtering conditions
        $query->andFilterWhere([
            'dpr_id' => $this->dpr_id,
            'dpr_date' => $this->dpr_date,
            'dpr_shots_acc' => $this->dpr_shots_acc,
            'dpr_shots_rej' => $this->dpr_shots_rej,
            'dpr_shots_skip' => $this->dpr_shots_skip,
            'dpr_shots_rec' => $this->dpr_shots_rec,
            'dpr_shots_rep' => $this->dpr_shots_rep,
            'dpr_conv_factor' => $this->dpr_conv_factor,
            'dpr_coverage' => $this->dpr_coverage,
        ]);

        $query->andFilterWhere(['like', 'dpr_area', $this->dpr_area])
            ->andFilterWhere(['like', 'dpr_shot_type', $this->dpr_shot_type])
            ->andFilterWhere(['like', 'dpr_acq_type', $this->dpr_acq_type])
            ->andFilterWhere(['like', 'field_parties.field_party_name', $this->dpr_field_party]);

        return $dataProvider;
    }
}
