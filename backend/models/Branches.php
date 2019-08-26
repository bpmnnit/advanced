<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $branch_id
 * @property int $branch_company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_create_date
 * @property string $branch_status
 *
 * @property Companies $branchCompany
 * @property Departments $departments
 * @property Companies[] $departments0
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_company_id', 'branch_name', 'branch_address', 'branch_create_date', 'branch_status'], 'required'],
            [['branch_company_id'], 'integer'],
            [['branch_create_date'], 'safe'],
            [['branch_status'], 'string'],
            [['branch_name'], 'string', 'max' => 45],
            [['branch_address'], 'string', 'max' => 128],
            [['branch_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['branch_company_id' => 'company_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'branch_company_id' => 'Company',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_create_date' => 'Branch Create Date',
            'branch_status' => 'Branch Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranchCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'branch_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasOne(Departments::className(), ['department_id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments0()
    {
        return $this->hasMany(Companies::className(), ['company_id' => 'department_id'])->viaTable('departments', ['department_id' => 'branch_id']);
    }
}
