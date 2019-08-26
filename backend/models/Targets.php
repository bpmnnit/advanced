<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "targets".
 *
 * @property int $target_id
 * @property int $target_field_party
 * @property string $target_date
 * @property double $target_conversion_factor
 * @property int $target_mgh
 *
 * @property FieldParties $target
 */
class Targets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'targets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['target_field_party', 'target_date', 'target_conversion_factor', 'target_mgh'], 'required'],
            [['target_field_party', 'target_mgh'], 'integer'],
            [['target_date'], 'safe'],
            [['target_conversion_factor'], 'number'],
            [['target_id'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['target_id' => 'field_party_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'target_id' => 'Target ID',
            'target_field_party' => 'Target Field Party',
            'target_date' => 'Target Date',
            'target_conversion_factor' => 'Target Conversion Factor',
            'target_mgh' => 'Target Mgh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarget()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'target_id']);
    }
}
