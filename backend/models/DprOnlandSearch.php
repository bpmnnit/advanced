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
            [['dpr_date', 'dpr_remarks', 'dpr_field_party', 'dpr_si', 'dprArea', 'dprSiNo', 'dprRegionName', 'dprRegionId'], 'safe'],
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

      // $query->joinWith(['dprFieldParty', 'dprSi']);
      $query->joinWith(['dprFieldParty']);

      $dataProvider = new ActiveDataProvider([
        'query' => $query,
      ]);

      $dataProvider->sort->attributes['dprArea'] = [
        'asc' => ['si.si_area' => SORT_ASC],
        'desc' => ['si.si_area' => SORT_DESC],
      ];
      // $dataProvider->sort->attributes['dprSiNo'] = [
      //   'asc' => ['si.si_no' => SORT_ASC],
      //   'desc' => ['si.si_no' => SORT_DESC],
      // ];

      // $this->load($params);

      if (!($this->load($params) && $this->validate())) {
        // uncomment the following line if you do not want to return any records when validation fails
        // $query->where('0=1');
        $query->joinWith(['dprSi', 'dprRegionId']);
        return $dataProvider;
      }

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

      $query->andFilterWhere(['like', 'field_parties.field_party_name', $this->dpr_field_party]); 
        // ->andFilterWhere(['like', 'si.si_no', $this->dpr_si]);
        // ->andFilterWhere(['like', 'region', self::getRegionNameFromSi($this->dpr_si)]);
        // ->orFilterWhere(['like', 'si.si_region', self::getRegionNameFromSi($this->dpr_si)]);
      
      $query->joinWith(['dprSi' => function($q) {
        $q->where('si.si_area LIKE "%' . $this->dprArea . '%"');
      }]);  

      $query->joinWith(['dprSi' => function($q) {
        $q->where('si.si_no LIKE "%' . $this->dprSiNo . '%"');
      }]);

      $query->joinWith(['dprRegionId' => function($q) {
        $q->where('si.si_region LIKE "%' . $this->dprRegionName . '%"');
      }]);

      return $dataProvider;
    }

    // public function getSiNo($si_id) {
    //   print_r($si_id);
    //   return Si::findOne($si_id)->si_no;
    // }

    // public function getSiArea($si_id) {
    //   return Si::findOne($si_id)->si_area;
    // }

    // public function getRegionNameFromSi($si_id) {
    //   $si = Si::findOne($si_id);
    //   return Regions::findOne($si->si_region)->region_name;
    // }
}
