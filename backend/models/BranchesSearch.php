<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Branches;
use backend\models\Companies;

/**
 * BranchesSearch represents the model behind the search form of `backend\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id'], 'integer'],
            [['branch_name', 'branch_company_id', 'branch_address', 'branch_create_date', 'branch_status'], 'safe'],
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
        $query = Branches::find();

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

        $query->joinWith('branchCompany');

        // grid filtering conditions
        $query->andFilterWhere([
            'branch_id' => $this->branch_id,
            // commenting below line because we want to search by company name and not by company id
            //'branch_company_id' => $this->branch_company_id, 
            'branch_create_date' => $this->branch_create_date,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'branch_address', $this->branch_address])
            ->andFilterWhere(['like', 'branch_status', $this->branch_status])
            ->andFilterWhere(['like', 'companies.company_name', $this->branch_company_id]);

        return $dataProvider;
    }
}
