<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_create_date
 * @property string $company_status
 * @property string $company_start_date
 *
 * @property Branches[] $branches
 * @property Departments $departments
 * @property Branches[] $departments0
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address', 'company_create_date', 'company_status', 'company_start_date'], 'required'],
            [['company_create_date', 'company_start_date'], 'safe'],
            [['company_status'], 'string'],
            [['company_name'], 'string', 'max' => 45],
            [['company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_create_date' => 'Company Create Date',
            'company_status' => 'Company Status',
            'company_start_date' => 'Company Start Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['branch_company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasOne(Departments::className(), ['department_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments0()
    {
        return $this->hasMany(Branches::className(), ['branch_id' => 'department_id'])->viaTable('departments', ['department_id' => 'company_id']);
    }
}
