<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "offproj".
 *
 * @property int $offproj_id
 * @property string $offproj_area
 * @property string $offproj_contract
 * @property string $offproj_vessel
 * @property string $offproj_contractor
 * @property string $offproj_start_date
 * @property string $offproj_end_date
 * @property string $offproj_mob_start_date
 * @property string $offproj_mob_end_date
 * @property double $offproj_volume
 * @property int $offproj_source_interval
 * @property int $offproj_sail_line_interval
 * @property int $offproj_streamer_length
 * @property double $offproj_receiver_interval
 * @property int $offproj_shot_point_interval
 * @property int $offproj_source_array
 * @property int $offproj_streamers
 * @property int $offproj_record_length
 * @property double $offproj_prime
 * @property double $offproj_infill_cap
 * @property string $offproj_prefix
 * @property double $offproj_direction_x
 * @property double $offproj_direction_y
 * @property string $offproj_streamer_profile
 * @property int $offproj_planned_completion_days
 *
 * @property Offdpr $offdpr
 */
class Offproj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offproj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offproj_area'], 'required'],
            [['offproj_start_date', 'offproj_end_date', 'offproj_mob_start_date', 'offproj_mob_end_date'], 'safe'],
            [['offproj_volume', 'offproj_receiver_interval', 'offproj_prime', 'offproj_infill_cap', 'offproj_direction_x', 'offproj_direction_y'], 'number'],
            [['offproj_source_interval', 'offproj_sail_line_interval', 'offproj_streamer_length', 'offproj_shot_point_interval', 'offproj_source_array', 'offproj_streamers', 'offproj_record_length', 'offproj_planned_completion_days'], 'integer'],
            [['offproj_area', 'offproj_contract', 'offproj_vessel', 'offproj_contractor', 'offproj_prefix'], 'string', 'max' => 64],
            [['offproj_streamer_profile'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'offproj_id' => 'ID',
            'offproj_area' => 'Area',
            'offproj_contract' => 'Contract',
            'offproj_vessel' => 'Vessel',
            'offproj_contractor' => 'Contractor',
            'offproj_start_date' => 'Start Date',
            'offproj_end_date' => 'End Date',
            'offproj_mob_start_date' => 'Mob St Date',
            'offproj_mob_end_date' => 'Mob End Date',
            'offproj_volume' => 'Volume',
            'offproj_source_interval' => 'Source Interval',
            'offproj_sail_line_interval' => 'Sail Line Interval',
            'offproj_streamer_length' => 'Streamer Length',
            'offproj_receiver_interval' => 'Receiver Interval',
            'offproj_shot_point_interval' => 'Shot Point Interval',
            'offproj_source_array' => 'Source Array',
            'offproj_streamers' => 'Streamers',
            'offproj_record_length' => 'Record Length',
            'offproj_prime' => 'Prime',
            'offproj_infill_cap' => 'Infill Cap',
            'offproj_prefix' => 'Prefix',
            'offproj_direction_x' => 'Direction X',
            'offproj_direction_y' => 'Direction Y',
            'offproj_streamer_profile' => 'Streamer Profile',
            'offproj_planned_completion_days' => 'Planned Completion Days',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffdpr()
    {
        return $this->hasOne(Offdpr::className(), ['offdpr_id' => 'offproj_id']);
    }
}
