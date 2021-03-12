<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daily_progress_reports".
 *
 * @property int $daily_progress_report_id
 * @property int $daily_progress_report_survey
 * @property int $daily_progress_report_field_party
 * @property string $daily_progress_report_date
 * @property int $daily_progress_report_accepted_shots
 * @property int $daily_progress_report_rejected_shots
 * @property int $daily_progress_report_skipped_shots
 * @property int $daily_progress_report_repeated_shots
 * @property string $daily_progress_report_instrument
 * @property double $daily_progress_report_skm
 *
 * @property FieldParties $dailyProgressReport
 * @property Surveys $dailyProgressReport0
 */
class DailyProgressReports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'daily_progress_reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['daily_progress_report_survey', 'daily_progress_report_field_party', 'daily_progress_report_date', 'daily_progress_report_accepted_shots', 'daily_progress_report_rejected_shots', 'daily_progress_report_skipped_shots', 'daily_progress_report_repeated_shots', 'daily_progress_report_skm'], 'required'],
            [['daily_progress_report_survey', 'daily_progress_report_field_party', 'daily_progress_report_accepted_shots', 'daily_progress_report_rejected_shots', 'daily_progress_report_skipped_shots', 'daily_progress_report_repeated_shots'], 'integer'],
            [['daily_progress_report_date'], 'safe'],
            [['daily_progress_report_instrument'], 'string'],
            [['daily_progress_report_skm'], 'number'],
            [['daily_progress_report_id'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['daily_progress_report_id' => 'field_party_id']],
            [['daily_progress_report_id'], 'exist', 'skipOnError' => true, 'targetClass' => Surveys::className(), 'targetAttribute' => ['daily_progress_report_id' => 'survey_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'daily_progress_report_id' => 'Daily Progress Report ID',
            'daily_progress_report_survey' => 'Daily Progress Report Survey',
            'daily_progress_report_field_party' => 'Daily Progress Report Field Party',
            'daily_progress_report_date' => 'Daily Progress Report Date',
            'daily_progress_report_accepted_shots' => 'Daily Progress Report Accepted Shots',
            'daily_progress_report_rejected_shots' => 'Daily Progress Report Rejected Shots',
            'daily_progress_report_skipped_shots' => 'Daily Progress Report Skipped Shots',
            'daily_progress_report_repeated_shots' => 'Daily Progress Report Repeated Shots',
            'daily_progress_report_instrument' => 'Daily Progress Report Instrument',
            'daily_progress_report_skm' => 'Daily Progress Report Skm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDailyProgressReport()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'daily_progress_report_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDailyProgressReport0()
    {
        return $this->hasOne(Surveys::className(), ['survey_id' => 'daily_progress_report_id']);
    }
}
