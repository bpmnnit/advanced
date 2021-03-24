<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DprOnland;
use backend\models\Si;
use backend\models\Regions;

/**
 * DprOnlandSearch represents the model behind the search form of `backend\models\DprOnland`.
 */
class DprOnlandSearch extends DprOnland
{
  public $dprArea;
  public $dprSiNo;
  public $dprRegionName;
  public $dprRegionId;
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
      return [
          [['dpr_id', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rec', 'dpr_shots_rep', 'dpr_coverage_shots'], 'integer'],
          [['dpr_date', 'dpr_remarks', 'dpr_field_party', 'dpr_si'], 'safe'],
          [['dpr_area', 'dpr_si_no', 'dpr_region'], 'string'],
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
  public function search($params) {
    $query = DprOnland::find();

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
      // uncomment the following line if you do not want to return any records when validation fails
      // $query->where('0=1');
      return $dataProvider;
    }

    $query->joinWith(['dprFieldParty', 'dprSi']);

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
        'dpr_area' => $this->dpr_area,
        'dpr_si_no' => $this->dpr_si_no,
        'dpr_region' => $this->dpr_region,
    ]);

    $query->andFilterWhere(['like', 'field_parties.field_party_name', $this->dpr_field_party]); 

    return $dataProvider;
  }
}
