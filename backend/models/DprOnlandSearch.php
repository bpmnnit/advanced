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
            [['dpr_id', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rec', 'dpr_shots_rep', 'dpr_coverage_shots'], 'integer'],
            [['dpr_date', 'dpr_remarks', 'dpr_field_party', 'dpr_si'], 'safe'],
            [['dpr_coverage'], 'number'],
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
        $query->joinWith('dprSi');

        // grid filtering conditions
        $query->andFilterWhere([
            'dpr_id' => $this->dpr_id,
            'dpr_date' => $this->dpr_date,
            'dpr_shots_acc' => $this->dpr_shots_acc,
            'dpr_shots_rej' => $this->dpr_shots_rej,
            'dpr_shots_skip' => $this->dpr_shots_skip,
            'dpr_shots_rec' => $this->dpr_shots_rec,
            'dpr_shots_rep' => $this->dpr_shots_rep,
            'dpr_coverage_shots' => $this->dpr_coverage_shots,
            'dpr_coverage' => $this->dpr_coverage,
            'dpr_remarks' => $this->dpr_remarks,
        ]);

        $query->andFilterWhere(['like', 'field_parties.field_party_name', $this->dpr_field_party])
          ->andFilterWhere(['like', 'si.si_no', $this->dpr_si])
          ->orFilterWhere(['like', 'si.si_area', $this->dpr_si]);

        return $dataProvider;
    }
}
