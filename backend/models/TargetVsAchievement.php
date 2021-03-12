<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "target_vs_achievement".
 *
 * @property int $idTarget_Achievement
 * @property string $target_achievement_fy
 * @property int $target_achievement_region
 * @property string $target_achievement_basin
 * @property string $target_achievement_area
 * @property int $target_achievement_field_party
 * @property string $target_achievement_acq_type
 * @property string $target_achievement_dept_out
 * @property string $target_achievement_acreage_type
 * @property string $target_achievement_land_offshore
 * @property double $target_achievement_re_target
 * @property double $target_achievement_be_target
 * @property double $target_achievement_achievement
 * @property string $target_achievement_remarks
 * @property string|null $target_achievement_fy
 * @property Regions $targetAchievementRegion
 * @property FieldParties $targetAchievementFieldParty
 */
class TargetVsAchievement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target_vs_achievement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['target_achievement_fy', 'target_achievement_acq_type', 'target_achievement_dept_out', 'target_achievement_acreage_type', 'target_achievement_land_offshore'], 'string'],
            [['target_achievement_region', 'target_achievement_si'], 'required'],
            [['target_achievement_region', 'target_achievement_si', 'target_achievement_field_party'], 'integer'],
            [['target_achievement_re_target', 'target_achievement_be_target', 'target_achievement_achievement'], 'number'],
            [['target_achievement_basin'], 'string', 'max' => 126],
            [['target_achievement_area'], 'string', 'max' => 256],
            [['target_achievement_remarks'], 'string', 'max' => 480],
            [['target_achievement_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['target_achievement_region' => 'region_id']],
            [['target_achievement_si'], 'exist', 'skipOnError' => true, 'targetClass' => Si::className(), 'targetAttribute' => ['target_achievement_si' => 'si_id']],
            [['target_achievement_field_party'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['target_achievement_field_party' => 'field_party_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTarget_Achievement' => 'ID',
            'target_achievement_fy' => 'FY',
            'target_achievement_region' => 'Region',
            'target_achievement_basin' => 'Basin',
            'target_achievement_area' => 'Area',
            'target_achievement_field_party' => 'FP',
            'target_achievement_acq_type' => 'Acq. Type',
            'target_achievement_dept_out' => 'Dept/Out',
            'target_achievement_acreage_type' => 'Acreage Type',
            'target_achievement_land_offshore' => 'On/Off',
            'target_achievement_re_target' => 'RE Target',
            'target_achievement_be_target' => 'BE Target',
            'target_achievement_achievement' => 'Achievement',
            'target_achievement_remarks' => 'Remarks',
            'target_achievement_si' => 'SI',
        ];
    }

    /** 
     * 
     * @return \yii\db\ActiveQuery
     * 
     */
    public function getTargetAchievementRegion()
    {
        return $this->hasOne(Regions::className(), ['region_id' => 'target_achievement_region']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getTargetAchievementSi()
    {
        return $this->hasOne(Si::className(), ['si_id' => 'target_achievement_si']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getTargetAchievementFieldParty()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'target_achievement_field_party']);
    }
}
