<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Postings;
use backend\models\Manpowers;
use backend\models\Regions;

/**
 * PostingsSearch represents the model behind the search form of `backend\models\Postings`.
 */
class PostingsSearch extends Postings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posting_id'], 'integer'],
            [['posting_at', 'posting_cpf', 'posting_on', 'posting_region'], 'safe'],
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
        $query = Postings::find();

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

        $query->joinWith('postingCpf');
        $query->joinWith('postingRegion');

        // grid filtering conditions
        $query->andFilterWhere([
            'posting_id' => $this->posting_id,
            //'posting_cpf' => $this->posting_cpf,
            //'posting_region' => $this->posting_region,
            'posting_on' => $this->posting_on,
        ]);

        $query->andFilterWhere(['like', 'posting_at', $this->posting_at])
            ->andFilterWhere(['like', 'manpowers.manpower_name', $this->posting_cpf])
            ->andFilterWhere(['like', 'regions.region_name', $this->posting_region]);

        return $dataProvider;
    }
}
