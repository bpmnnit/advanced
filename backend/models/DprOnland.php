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
 * @property double $dpr_conv_factor
 * @property double $dpr_coverage
 * @property string $dpr_area
 * @property string $dpr_shot_type
 * @property string $dpr_acq_type
 * @property string $dpr_party_type
 *
 * @property FieldParties $dprFieldParty
 */
class DprOnland extends \yii\db\ActiveRecord
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
            [['dpr_field_party', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rec'], 'integer'],
            [['dpr_conv_factor', 'dpr_coverage'], 'number'],
            [['dpr_shot_type', 'dpr_acq_type', 'dpr_party_type'], 'string'],
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
            'dpr_id' => 'Dpr ID',
            'dpr_date' => 'Dpr Date',
            'dpr_field_party' => 'Dpr Field Party',
            'dpr_shots_acc' => 'Dpr Shots Acc',
            'dpr_shots_rej' => 'Dpr Shots Rej',
            'dpr_shots_skip' => 'Dpr Shots Skip',
            'dpr_shots_rec' => 'Dpr Shots Rec',
            'dpr_conv_factor' => 'Dpr Conv Factor',
            'dpr_coverage' => 'Dpr Coverage',
            'dpr_area' => 'Dpr Area',
            'dpr_shot_type' => 'Dpr Shot Type',
            'dpr_acq_type' => 'Dpr Acq Type',
            'dpr_party_type' => 'Dpr Party Type',
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
