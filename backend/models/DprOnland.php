<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dpr_onland".
 *
 * @property int $dpr_id
 * @property string $dpr_date
 * @property int $dpr_field_party
 * @property int $dpr_shots_acc
 * @property int $dpr_shots_rej
 * @property int $dpr_shots_skip
 * @property int $dpr_shots_rec
 * @property int $dpr_shots_rep
 * @property double $dpr_conv_factor
 * @property double $dpr_coverage
 * @property string $dpr_area
 * @property string $dpr_shot_type
 * @property string $dpr_acq_type
 *
 * @property FieldParties $dprFieldParty
 */
class DPROnland extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dpr_onland';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dpr_date', 'dpr_field_party'], 'required'],
            [['dpr_date'], 'safe'],
            [['dpr_field_party', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rec', 'dpr_shots_rep'], 'integer'],
            [['dpr_conv_factor', 'dpr_coverage'], 'number'],
            [['dpr_shot_type', 'dpr_acq_type'], 'string'],
            [['dpr_area'], 'string', 'max' => 128],
            [['dpr_field_party'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['dpr_field_party' => 'field_party_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dpr_id' => 'DPR ID',
            'dpr_date' => 'DPR Date',
            'dpr_field_party' => 'DPR Field Party',
            'dpr_shots_acc' => 'DPR Shots Acc',
            'dpr_shots_rej' => 'DPR Shots Rej',
            'dpr_shots_skip' => 'DPR Shots Skip',
            'dpr_shots_rec' => 'DPR Shots Rec',
            'dpr_conv_factor' => 'DPR Conv Factor',
            'dpr_coverage' => 'DPR Coverage',
            'dpr_area' => 'DPR Area',
            'dpr_shot_type' => 'DPR Shot Type',
            'dpr_acq_type' => 'DPR Acq Type',
            'dpr_shots_rep' => 'DPR Shots Rep'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDprFieldParty()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'dpr_field_party']);
    }
}
