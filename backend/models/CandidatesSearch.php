<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Candidates;

/**
 * CandidatesSearch represents the model behind the search form of `backend\models\Candidates`.
 */
class CandidatesSearch extends Candidates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'category', 'venue', 'advt_no', 'post_type', 'criteria_met', 'post', 'location_of_post', 'payscale', 'class', 'discipline', 'shortlisted_as_ur', 'candidate_name', 'dob', 'address_1', 'address_2', 'address_3', 'district', 'state', 'pin', 'mobile', 'email', 'ex_serviceman', 'pwd', 'pwd_type', 'departmental', 'cpfno', 'current_work_location', 'ex_apprentice', 'qualification', 'percentage_in_qualification', 'total_marks', 'wt_85', 'wt_90', 'skill_test_steno', 'skill_test_typing', 'skill_test_others', 'pst', 'pet', 'marks_written_A', 'marks_acad_B_15', 'marks_acad_B_10', 'marks_apprent_5', 'marks_apprent_0', 'totalmarks_ABC'], 'safe'],
            [['id', 'reg_no'], 'integer'],
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
        $query = Candidates::find();

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
            'date' => $this->date,
            'dob' => $this->dob,
            'id' => $this->id,
            'reg_no' => $this->reg_no,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'advt_no', $this->advt_no])
            ->andFilterWhere(['like', 'post_type', $this->post_type])
            ->andFilterWhere(['like', 'criteria_met', $this->criteria_met])
            ->andFilterWhere(['like', 'post', $this->post])
            ->andFilterWhere(['like', 'location_of_post', $this->location_of_post])
            ->andFilterWhere(['like', 'payscale', $this->payscale])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'discipline', $this->discipline])
            ->andFilterWhere(['like', 'shortlisted_as_ur', $this->shortlisted_as_ur])
            ->andFilterWhere(['like', 'candidate_name', $this->candidate_name])
            ->andFilterWhere(['like', 'address_1', $this->address_1])
            ->andFilterWhere(['like', 'address_2', $this->address_2])
            ->andFilterWhere(['like', 'address_3', $this->address_3])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'pin', $this->pin])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'ex_serviceman', $this->ex_serviceman])
            ->andFilterWhere(['like', 'pwd', $this->pwd])
            ->andFilterWhere(['like', 'pwd_type', $this->pwd_type])
            ->andFilterWhere(['like', 'departmental', $this->departmental])
            ->andFilterWhere(['like', 'cpfno', $this->cpfno])
            ->andFilterWhere(['like', 'current_work_location', $this->current_work_location])
            ->andFilterWhere(['like', 'ex_apprentice', $this->ex_apprentice])
            ->andFilterWhere(['like', 'qualification', $this->qualification])
            ->andFilterWhere(['like', 'percentage_in_qualification', $this->percentage_in_qualification])
            ->andFilterWhere(['like', 'total_marks', $this->total_marks])
            ->andFilterWhere(['like', 'wt_85', $this->wt_85])
            ->andFilterWhere(['like', 'wt_90', $this->wt_90])
            ->andFilterWhere(['like', 'skill_test_steno', $this->skill_test_steno])
            ->andFilterWhere(['like', 'skill_test_typing', $this->skill_test_typing])
            ->andFilterWhere(['like', 'skill_test_others', $this->skill_test_others])
            ->andFilterWhere(['like', 'pst', $this->pst])
            ->andFilterWhere(['like', 'pet', $this->pet])
            ->andFilterWhere(['like', 'marks_written_A', $this->marks_written_A])
            ->andFilterWhere(['like', 'marks_acad_B_15', $this->marks_acad_B_15])
            ->andFilterWhere(['like', 'marks_acad_B_10', $this->marks_acad_B_10])
            ->andFilterWhere(['like', 'marks_apprent_5', $this->marks_apprent_5])
            ->andFilterWhere(['like', 'marks_apprent_0', $this->marks_apprent_0])
            ->andFilterWhere(['like', 'totalmarks_ABC', $this->totalmarks_ABC]);

        return $dataProvider;
    }
}
