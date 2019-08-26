<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "surveys".
 *
 * @property int $survey_id
 * @property string $survey_sig
 * @property string $survey_name
 * @property int $survey_region
 * @property string $survey_description
 * @property string $survey_shot_type
 * @property string $survey_acq_type
 * @property string $survey_area_name
 * @property int $survey_field_party
 * @property string $survey_create_date
 * @property string $survey_information
 * @property string $survey_onshore_offshore
 *
 * @property FieldParties $survey
 */
class Surveys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surveys';
    }

    /**
     * @var UploadedFile
     */
    public $survey_file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['survey_region', 'survey_field_party'], 'integer'],
            [['survey_description', 'survey_shot_type', 'survey_acq_type', 'survey_onshore_offshore'], 'string'],
            [['survey_sig', 'survey_name', 'survey_create_date'], 'string', 'max' => 45],
            [['survey_area_name'], 'string', 'max' => 128],
            [['survey_information'], 'string', 'max' => 1024],
            [['survey_field_party'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['survey_field_party' => 'field_party_id']],
            [['survey_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'txt,jpg,png,pdf,docx,xlsx,pptx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'survey_id' => 'ID',
            'survey_sig' => 'SIG',
            'survey_name' => 'Name',
            'survey_region' => 'Region',
            'survey_description' => 'Objective',
            'survey_shot_type' => 'Source',
            'survey_acq_type' => 'Acquistion Type',
            'survey_area_name' => 'Area',
            'survey_field_party' => 'Field Party',
            'survey_information' => 'Information File Link',
            'survey_file' => 'Survey Information File',
            'survey_onshore_offshore' => 'Onshore/Offshore',
            'survey_create_date' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyFieldParty()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'survey_field_party']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyRegion() {
        return $this->hasOne(Regions::className(), ['region_id' => 'survey_region']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->survey_file->saveAs('uploads/' . $this->survey_file->baseName . '.' . $this->survey_file->extension);
            return true;
        } else {
            return false;
        }
    }
}
