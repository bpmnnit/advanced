<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "si".
 *
 * @property int $si_id
 * @property string $si_no Seismic Investigation
 * @property int $si_basin Basin
 * @property int $si_region Region
 * @property int $si_fp
 * @property string $si_area Area
 * @property string $si_objective Objective of the survey
 * @property string $si_depth_zoi
 * @property string $si_time_zoi
 * @property string $si_acq_type Acquiasition type
 * @property string $si_qow Quantum of work
 * @property string $si_source_type Source Type
 * @property string $si_spread_type Spread Type (EXample):- End on, Split spred
 * @property string $si_bin_size Bin Size
 * @property double $si_gi Group Interval
 * @property double $si_si Shot Interval
 * @property double $si_rli Receiver line Interval
 * @property double $si_sli Shot line Interval
 * @property string $si_norl Total number of Receiver Lines
 * @property string $si_rpl Number of Channel per receiver line
 * @property string $si_tac Total active channel in unit templet
 * @property int $si_sps shot per shalve
 * @property string $si_fold
 * @property double $si_min_min_offset
 * @property double $si_min_max_offset
 * @property double $si_max_min_offset
 * @property double $si_max_max_offset
 * @property string $si_swath_rollover
 * @property string $si_rec_line_bearing
 * @property double $si_ar Aspect ratio
 * @property int $si_total_shot
 * @property double $si_conversion_factor Conversion Factor
 * @property string $si_rec_inst Recording instrument type and model
 * @property int $si_record_length
 * @property double $si_sample_rate
 * @property string $si_rec_format
 * @property string $si_sensor
 * @property string $si_field_season
 * @property string $si_on_off
 * @property string $si_start_date Start Date
 * @property string $si_end_date End date
 *
 * @property DprOnland[] $dprOnlands
 * @property BasinIndia $siBasin
 * @property Regions $siRegion
 * @property FieldParties $siFp
 */
class Si extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'si';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['si_basin', 'si_region', 'si_area', 'si_fp', 'si_conversion_factor', ], 'required'],
            [['si_basin', 'si_region', 'si_sps', 'si_record_length' ,'si_mgh', 'si_total_shot', 'si_fp'], 'integer'],
            [['si_acq_type', 'si_source_type', 'si_field_season', 'si_on_off'], 'string'],
            [['si_gi', 'si_si', 'si_rli', 'si_sli', 'si_min_min_offset', 'si_min_max_offset', 'si_max_min_offset', 'si_max_max_offset', 'si_ar', 'si_conversion_factor', 'si_sample_rate'], 'number'],
            [['si_start_date', 'si_end_date'], 'safe'],
            [['si_no', 'si_qow', 'si_bin_size'], 'string', 'max' => 45],
            [['si_area', 'si_norl', 'si_rpl', 'si_tac', 'si_fold'], 'string', 'max' => 128],
            [['si_depth_zoi', 'si_time_zoi'], 'string', 'max' => 146],
            [['si_objective'], 'string', 'max' => 260],
            [['si_spread_type', 'si_rec_format'], 'string', 'max' => 46],
            [['si_swath_rollover', 'si_rec_line_bearing'], 'string', 'max' => 26],
            [['si_rec_inst', 'si_sensor'], 'string', 'max' => 120],
            [['si_basin'], 'exist', 'skipOnError' => true, 'targetClass' => BasinIndia::className(), 'targetAttribute' => ['si_basin' => 'idbasin_india']],
            [['si_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['si_region' => 'region_id']],
            [['si_fp'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['si_fp' => 'field_party_id']],
            ['si_start_date', 'date', 'format' => 'php:Y-m-d'],
            ['si_end_date', 'date', 'format' => 'php:Y-m-d'],
            ['si_start_date', 'compare', 'compareAttribute' => 'si_end_date', 'operator' => '<', 'enableClientValidation' => false, 'when' => function($model) {
              return !empty($model->si_start_date) && !empty($model->si_end_date);
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'si_id' => 'ID',
            'si_no' => 'SI',
            'si_basin' => 'Basin',
            'si_region' => 'Region',
            'si_area' => 'Area',
            'si_fp' => 'FP',
            'si_objective' => 'Objective',
            'si_depth_zoi' => 'Depth ZOI',
            'si_time_zoi' => 'Time ZOI',
            'si_acq_type' => 'Acq. Type',
            'si_qow' => 'Volume',
            'si_source_type' => 'Source Type',
            'si_spread_type' => 'Spread Type',
            'si_bin_size' => 'Bin Size',
            'si_gi' => 'GI',
            'si_si' => 'SI',
            'si_rli' => 'RLI',
            'si_sli' => 'SLI',
            'si_norl' => 'No. of Receiver Lines',
            'si_rpl' => 'Receiver Per Line',
            'si_tac' => 'Total Active Channels',
            'si_sps' => 'Shot Per Shalvo',
            'si_fold' => 'Fold',
            'si_min_min_offset' => 'Min Min Offset',
            'si_min_max_offset' => 'Min Max Offset',
            'si_max_min_offset' => 'Max Min Offset',
            'si_max_max_offset' => 'Max Max Offset',
            'si_swath_rollover' => 'Swath Rollover',
            'si_rec_line_bearing' => 'Rec. Line Bearing',
            'si_ar' => 'Aspect Ratio',
            'si_conversion_factor' => 'Conv. Factor',
            'si_mgh'=> 'MGH',
            'si_total_shot' => 'Total Shots',
            'si_rec_inst' => 'Rec. Inst.',
            'si_record_length' => 'Record Length',
            'si_sample_rate' => 'Sample Rate',
            'si_rec_format' => 'Rec. Format',
            'si_sensor' => 'Sensor',
            'si_field_season' => 'Field Season',
            'si_on_off' => 'On/Off',
            'si_start_date' => 'Start Date',
            'si_end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDprOnlands()
    {
        return $this->hasMany(DprOnland::className(), ['dpr_si' => 'si_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiBasin()
    {
        return $this->hasOne(BasinIndia::className(), ['idbasin_india' => 'si_basin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiRegion()
    {
        return $this->hasOne(Regions::className(), ['region_id' => 'si_region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiFp()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'si_fp']);
    }
}
