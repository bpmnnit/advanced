<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $region_id
 * @property string $region_name
 * @property string $region_description
 * @property string $region_create_date
 *
 * @property Postings[] $postings
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_name', 'region_create_date'], 'required'],
            [['region_description'], 'string'],
            [['region_create_date'], 'safe'],
            [['region_name'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'region_name' => 'Region Name',
            'region_description' => 'Region Description',
            'region_create_date' => 'Region Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostings()
    {
        return $this->hasMany(Postings::className(), ['posting_region' => 'region_id']);
    }
}
