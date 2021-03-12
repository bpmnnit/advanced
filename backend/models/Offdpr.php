<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "offdpr".
 *
 * @property int $offdpr_id
 * @property string $offdpr_date
 * @property string $offdpr_streamer_profile
 * @property int $offdpr_sail_line
 * @property string $offdpr_line_no
 * @property string $offdpr_type
 * @property double $offdpr_direction
 * @property int $offdpr_sp_from
 * @property int $offdpr_sp_to
 * @property int $offdpr_preplot_sp_from
 * @property int $offdpr_preplot_sp_to
 * @property int $offdpr_shots
 * @property int $offdpr_bad_sp
 * @property int $offdpr_shots_acc
 * @property int $offdpr_cmps
 * @property double $offdpr_prime
 * @property double $offdpr_infill
 * @property double $offdpr_chargeable_prime
 * @property int $offdpr_chargeable_infill
 * @property double $offdpr_ros
 * @property string $offdpr_remarks_line
 * @property double $offdpr_standbyhrs
 * @property double $offdpr_chargeable_standbyhrs
 * @property string $offdpr_remarks_standby
 * @property string $offdpr_ntbp
 */
class Offdpr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offdpr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offdpr_date'], 'safe'],
            [['offdpr_streamer_profile', 'offdpr_remarks_line', 'offdpr_remarks_standby', 'offdpr_ntbp'], 'string'],
            [['offdpr_sail_line', 'offdpr_sp_from', 'offdpr_sp_to', 'offdpr_preplot_sp_from', 'offdpr_preplot_sp_to', 'offdpr_shots', 'offdpr_bad_sp', 'offdpr_shots_acc', 'offdpr_cmps', 'offdpr_chargeable_infill', 'offdpr_proj'], 'integer'],
            [['offdpr_direction', 'offdpr_prime', 'offdpr_infill', 'offdpr_chargeable_prime', 'offdpr_ros', 'offdpr_standbyhrs', 'offdpr_chargeable_standbyhrs'], 'number'],
            [['offdpr_line_no'], 'string', 'max' => 64],
            [['offdpr_type'], 'string', 'max' => 8],
            [['offdpr_proj'], 'exist', 'skipOnError' => true, 'targetClass' => Offproj::className(), 'targetAttribute' => ['offdpr_proj' => 'offproj_id']], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'offdpr_id' => 'ID',
            'offdpr_date' => 'Date',
            'offdpr_streamer_profile' => 'Stmr Profile',
            'offdpr_sail_line' => 'Sail Ln',
            'offdpr_line_no' => 'Ln No',
            'offdpr_type' => 'Type',
            'offdpr_direction' => 'Dir.',
            'offdpr_sp_from' => 'Sp From',
            'offdpr_sp_to' => 'Sp To',
            'offdpr_preplot_sp_from' => 'Pre. Sp From',
            'offdpr_preplot_sp_to' => 'Pre. Sp To',
            'offdpr_shots' => 'Shots',
            'offdpr_bad_sp' => 'Bad Sp',
            'offdpr_shots_acc' => 'Shots Acc',
            'offdpr_cmps' => 'Cmps',
            'offdpr_prime' => 'Prime',
            'offdpr_infill' => 'Infill',
            'offdpr_chargeable_prime' => 'Ch. Prime',
            'offdpr_chargeable_infill' => 'Ch. Infill',
            'offdpr_ros' => 'Ros',
            'offdpr_remarks_line' => 'Remarks Line',
            'offdpr_standbyhrs' => 'Stby. Hrs',
            'offdpr_chargeable_standbyhrs' => 'Ch. Stby. Hrs',
            'offdpr_remarks_standby' => 'Remarks Stby',
            'offdpr_ntbp' => 'NTBP',
            'offdpr_proj' => 'Project',
        ];
    }

    /** 
    * Gets query for [[OffdprProj]]. 
    * 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getOffdprProj() 
   { 
       return $this->hasOne(Offproj::className(), ['offproj_id' => 'offdpr_proj']); 
   } 
}
