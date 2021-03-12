<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Targets;

/**
 * TargetsSearch represents the model behind the search form of `backend\models\Targets`.
 */
class TargetsSearch extends Targets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['target_id', 'target_field_party', 'target_mgh'], 'integer'],
            [['target_date'], 'safe'],
            [['target_conversion_factor'], 'number'],
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
        $query = Targets::find();

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
            'target_id' => $this->target_id,
            'target_field_party' => $this->target_field_party,
            'target_date' => $this->target_date,
            'target_conversion_factor' => $this->target_conversion_factor,
            'target_mgh' => $this->target_mgh,
        ]);

        return $dataProvider;
    }
}
