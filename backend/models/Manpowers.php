<?php

namespace backend\models;

use Yii;
use yii\validators\InlineValidator;

/**
 * This is the model class for table "manpowers".
 *
 * @property int $manpower_cpf
 * @property string $manpower_name
 * @property string $manpower_designation
 * @property string $manpower_charge
 * @property string $manpower_mobile_number
 * @property string $manpower_create_date
 *
 * @property Postings[] $postings
 */
class Manpowers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manpowers';
    }

    public function checkMobileNumber($attribute, $params, $validator) {
        if(!preg_match('/^[0][1-9]\d{9}$|^[1-9]\d{9}$/', $this->$attribute)) {
            $this->addError($attribute, 'Mobile number must contain exactly 10 digits.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manpower_cpf', 'manpower_name', 'manpower_create_date'], 'required'],
            [['manpower_cpf'], 'integer'],
            [['manpower_create_date'], 'safe'],
            [['manpower_level', 'manpower_discipline', 'manpower_designation'], 'string'],
            [['manpower_name'], 'string', 'max' => 64],
            [['manpower_charge'], 'string', 'max' => 32],
            [['manpower_mobile_number'], 'checkMobileNumber', 'skipOnEmpty' => true, 'skipOnError' => false],
            [['manpower_cpf'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'manpower_cpf' => 'CPF',
            'manpower_name' => 'Name',
            'manpower_designation' => 'Designation',
            'manpower_charge' => 'Charge',
            'manpower_mobile_number' => 'Mobile Number',
            'manpower_create_date' => 'Create Date',
            'manpower_level' => 'Level',
            'manpower_discipline' => 'Discipline',
            'manpower_designation' => 'Designation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostings()
    {
        return $this->hasMany(Postings::className(), ['posting_cpf' => 'manpower_cpf']);
    }
}
