<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "postings".
 *
 * @property int $posting_id
 * @property int $posting_cpf
 * @property int $posting_region
 * @property string $posting_at
 * @property string $posting_on
 * @property int|null $posting_years
 * @property int|null $posting_days
 * @property int|null $posting_totaldays
 *
 * @property Manpowers $postingCpf
 * @property Regions $postingRegion
 */
class Postings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'postings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posting_cpf', 'posting_region', 'posting_at', 'posting_on'], 'required'],
            [['posting_cpf', 'posting_region', 'posting_years', 'posting_days', 'posting_totaldays'], 'integer'],
            [['posting_at'], 'string'],
            [['posting_on'], 'safe'],
            [['posting_cpf'], 'exist', 'skipOnError' => true, 'targetClass' => Manpowers::className(), 'targetAttribute' => ['posting_cpf' => 'manpower_cpf']],
            [['posting_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['posting_region' => 'region_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'posting_id' => 'ID',
            'posting_cpf' => 'Name',
            'posting_at' => 'Posted At',
            'posting_region' => 'Region',
            'posting_on' => 'Posting Date',
            'posting_years' => 'Years',
           'posting_days' => 'Days',
           'posting_totaldays' => 'Totaldays',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostingCpf()
    {
        return $this->hasOne(Manpowers::className(), ['manpower_cpf' => 'posting_cpf']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostingRegion()
    {
        return $this->hasOne(Regions::className(), ['region_id' => 'posting_region']);
    }
}
