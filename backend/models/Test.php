<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $idtest
 * @property string $test_1
 * @property string $test_2
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtest'], 'required'],
            [['idtest'], 'integer'],
            [['test_1', 'test_2'], 'string', 'max' => 45],
            [['idtest'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtest' => 'Idtest',
            'test_1' => 'Test 1',
            'test_2' => 'Test 2',
        ];
    }
}
