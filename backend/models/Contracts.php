<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contracts".
 *
 * @property int $contract_id
 * @property string $contract_field_season
 * @property string $contract_tender_number
 * @property string $contract_tender_type
 * @property string $contract_survey_type
 * @property string $contract_description
 * @property string $contract_area
 * @property string $contract_basin
 * @property int $contract_region
 * @property string $contract_block
 * @property string $contract_contactor
 * @property int $contract_awarded_value
 * @property string $contract_start_date
 * @property string $contract_end_date
 * @property string $contract_remarks
 *
 * @property Regions $contractRegion
 */
class Contracts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contracts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contract_region'], 'required'],
            [['contract_region', 'contract_awarded_value', 'contract_quantum'], 'integer'],
            [['contract_field_season'], 'string'],
            [['contract_start_date', 'contract_end_date'], 'safe'],
            [['contract_tender_number', 'contract_tender_type', 'contract_area', 'contract_basin', 'contract_block', 'contract_contactor'], 'string', 'max' => 120],
            [['contract_survey_type'], 'string', 'max' => 46],
            [['contract_remarks', 'contract_description'], 'string', 'max' => 456],
            [['contract_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['contract_region' => 'region_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contract_id' => 'ID',
            'contract_field_season' => 'Field Season',
            'contract_tender_number' => 'Tender Number',
            'contract_tender_type' => 'Tender Type',
            'contract_survey_type' => 'Survey Type',
            'contract_description' => 'Description',
            'contract_area' => 'Area',
            'contract_basin' => 'Basin',
            'contract_region' => 'Region',
            'contract_block' => 'Block',
            'contract_contactor' => 'Contactor',
            'contract_awarded_value' => 'Awarded Value',
            'contract_start_date' => 'Start Date',
            'contract_end_date' => 'End Date',
            'contract_remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractRegion()
    {
        return $this->hasOne(Regions::className(), ['region_id' => 'contract_region']);
    }
}
