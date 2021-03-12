<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "field_parties".
 *
 * @property int $field_party_id
 * @property string $field_party_name
 * @property string $field_party_type
 * @property int $field_party_region
 * @property int $field_party_chief
 * @property string $field_party_create_date
 *
 * @property Surveys[] $surveys
 * @property DprOnland[] $dprOnlands
 * @property Manpowers $fieldPartyChief
 * @property Regions $fieldPartyRegion
 */
class FieldParties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'field_parties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_party_region', 'field_party_chief'], 'integer'],
            [['field_party_type'], 'string'],
            [['field_party_create_date'], 'safe'],
            [['field_party_name'], 'string', 'max' => 45],
            [['field_party_chief'], 'exist', 'skipOnError' => true, 'targetClass' => Manpowers::className(), 'targetAttribute' => ['field_party_chief' => 'manpower_cpf']],
            [['field_party_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['field_party_region' => 'region_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'field_party_id' => 'FP ID',
            'field_party_name' => 'Field Party',
            'field_party_type' => 'FP Type',
            'field_party_region' => 'FP Region',
            'field_party_chief' => 'FP Chief',
            'field_party_create_date' => 'FP Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldPartyChief()
    {
        return $this->hasOne(Manpowers::className(), ['manpower_cpf' => 'field_party_chief']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldPartyRegion()
    {
        return $this->hasOne(Regions::className(), ['region_id' => 'field_party_region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveys()
    {
        return $this->hasMany(Surveys::className(), ['survey_field_party' => 'field_party_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDprOnlands()
    {
        return $this->hasMany(DprOnland::className(), ['dpr_field_party' => 'field_party_id']);
    }
}
