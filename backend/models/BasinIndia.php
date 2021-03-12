<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "basin_india".
 *
 * @property int $idbasin_india
 * @property string $basin_india_name
 * @property string $basin_india_type
 */
class BasinIndia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basin_india';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basin_india_name', 'basin_india_type'], 'required'],
            [['basin_india_type'], 'string'],
            [['basin_india_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbasin_india' => 'Idbasin India',
            'basin_india_name' => 'Basin India Name',
            'basin_india_type' => 'Basin India Type',
        ];
    }
}
