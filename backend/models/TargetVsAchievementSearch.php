<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TargetVsAchievement;

/**
 * TargetVsAchievementSearch represents the model behind the search form of `\backend\models\TargetVsAchievement`.
 */
class TargetVsAchievementSearch extends TargetVsAchievement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTarget_Achievement'], 'integer'],
            [['target_achievement_region', 'target_achievement_si', 'target_achievement_fy', 'target_achievement_basin', 'target_achievement_area', 'target_achievement_field_party', 'target_achievement_acq_type', 'target_achievement_dept_out', 'target_achievement_acreage_type', 'target_achievement_land_offshore', 'target_achievement_remarks'], 'safe'],
            [['target_achievement_re_target', 'target_achievement_be_target', 'target_achievement_achievement'], 'number'],
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
        $query = TargetVsAchievement::find();

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

        $query->joinWith('targetAchievementRegion');
        $query->joinWith('targetAchievementSi');
        $query->joinWith('targetAchievementFieldParty');
        // grid filtering conditions
        $query->andFilterWhere([
            'idTarget_Achievement' => $this->idTarget_Achievement,
            'target_achievement_re_target' => $this->target_achievement_re_target,
            'target_achievement_be_target' => $this->target_achievement_be_target,
            'target_achievement_achievement' => $this->target_achievement_achievement,
        ]);

        $query->andFilterWhere(['like', 'target_achievement_fy', $this->target_achievement_fy])
          ->andFilterWhere(['like', 'target_achievement_basin', $this->target_achievement_basin])
          ->andFilterWhere(['like', 'target_achievement_area', $this->target_achievement_area])
          ->andFilterWhere(['like', 'target_achievement_acq_type', $this->target_achievement_acq_type])
          ->andFilterWhere(['like', 'target_achievement_dept_out', $this->target_achievement_dept_out])
          ->andFilterWhere(['like', 'target_achievement_acreage_type', $this->target_achievement_acreage_type])
          ->andFilterWhere(['like', 'target_achievement_land_offshore', $this->target_achievement_land_offshore])
          ->andFilterWhere(['like', 'target_achievement_remarks', $this->target_achievement_remarks]);

        $query->andFilterWhere(['like', 'field_parties.field_party_name', $this->target_achievement_field_party])
          ->andFilterWhere(['like', 'regions.region_name', $this->target_achievement_region])
          ->andFilterWhere(['like', 'si.si_no', $this->target_achievement_si]);

        return $dataProvider;
    }
}
