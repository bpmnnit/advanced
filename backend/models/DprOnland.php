<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\models\Si;
/**
 * This is the model class for table "dpr_onland".
 *
 * @property int $dpr_id
 * @property int $dpr_si
 * @property string $dpr_date
 * @property int $dpr_field_party
 * @property int $dpr_shots_acc
 * @property int $dpr_shots_rej
 * @property int $dpr_shots_skip
 * @property int $dpr_shots_rep
 * @property int $dpr_shots_rec
 * @property double $dpr_coverage
 * @property string $dpr_remarks
 *
 * @property FieldParties $dprFieldParty
 * @property Si $dprSi
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
            [['dpr_si', 'dpr_date', 'dpr_field_party', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rep'], 'required'],
            [['dpr_si', 'dpr_field_party', 'dpr_shots_acc', 'dpr_shots_rej', 'dpr_shots_skip', 'dpr_shots_rep', 'dpr_shots_rec', 'dpr_coverage_shots'], 'integer'],
            [['dpr_date'], 'safe'],
            [['dpr_date'], 'date', 'format' => 'php:Y-m-d', 'max' => date('Y-m-d'), 'message' => 'Cannot enter DPR for future date.'],
            [['dpr_coverage'], 'number'],
            [['dpr_remarks'], 'string', 'max' => 128],
            [['dpr_field_party'], 'exist', 'skipOnError' => true, 'targetClass' => FieldParties::className(), 'targetAttribute' => ['dpr_field_party' => 'field_party_id']],
            [['dpr_si'], 'exist', 'skipOnError' => true, 'targetClass' => Si::className(), 'targetAttribute' => ['dpr_si' => 'si_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dpr_id' => 'ID',
            'dpr_si' => 'Seismic Investigation',
            'dpr_date' => 'Date',
            'dpr_field_party' => 'Field Party',
            'dpr_shots_acc' => 'Acc',
            'dpr_shots_rej' => 'Rej',
            'dpr_shots_skip' => 'Skp',
            'dpr_shots_rep' => 'Rep',
            'dpr_shots_rec' => 'Rec',
            'dpr_coverage_shots' => 'Coverage Shots',
            'dpr_coverage' => 'Coverage',
            'dpr_remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDprFieldParty()
    {
        return $this->hasOne(FieldParties::className(), ['field_party_id' => 'dpr_field_party']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getDprSi()
    {
       return $this->hasOne(Si::className(), ['si_id' => 'dpr_si']);
    }

    /**
    * @return list
    */
    public function siAreaTogether() {
      $list = [];
      $sis = Si::find()->orderBy('si_no')->all();

      $list = Arrayhelper::map($sis, 'si_id', function($si) {
          return $si->si_no.' ('.$si->si_area.')'; 
      });
      return $list;
    }

    public function totalTargetAchievement($type, $year) {
      $query = "SELECT SUM(target_achievement_be_target) as BE, SUM(target_achievement_re_target) as RE, SUM(target_achievement_achievement) as ACH FROM cgsdb.target_vs_achievement where target_achievement_fy = '".$year."' and target_achievement_acq_type like '%".$type."%';";
      $connection = Yii::$app->getDb();
      $command = $connection->createCommand($query);
      $result = $command->queryAll();
      $totals = array('BE' => $result[0]['BE'], 'RE' => $result[0]['RE'], 'ACH' => $result[0]['ACH']);
      return $totals;
    }
}