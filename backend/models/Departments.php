<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $department_id
 * @property string $department_name
 * @property string $department_create_date
 * @property string $department_status
 * @property int $department_branch_id
 * @property int $department_company_id
 *
 * @property Branches $department
 * @property Companies $department0
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_name', 'department_create_date', 'department_status', 'department_branch_id', 'department_company_id'], 'required'],
            [['department_create_date'], 'safe'],
            [['department_status'], 'string'],
            [['department_branch_id', 'department_company_id'], 'integer'],
            [['department_name'], 'string', 'max' => 45],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['department_id' => 'branch_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['department_id' => 'company_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'department_name' => 'Department Name',
            'department_create_date' => 'Department Create Date',
            'department_status' => 'Department Status',
            'department_branch_id' => 'Department Branch ID',
            'department_company_id' => 'Department Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment0()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'department_id']);
    }
}
