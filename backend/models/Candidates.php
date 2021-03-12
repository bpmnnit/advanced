<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "candidates".
 *
 * @property string $date
 * @property string $category
 * @property string $venue
 * @property string $advt_no
 * @property string $post_type
 * @property string $criteria_met
 * @property string $post
 * @property string $location_of_post
 * @property string $payscale
 * @property string $class
 * @property string $discipline
 * @property string $shortlisted_as_ur
 * @property string $candidate_name
 * @property string $dob
 * @property string $address_1
 * @property string $address_2
 * @property string $address_3
 * @property string $district
 * @property string $state
 * @property string $pin
 * @property string $mobile
 * @property string $email
 * @property string $ex_serviceman
 * @property string $pwd
 * @property string $pwd_type
 * @property string $departmental
 * @property string $cpfno
 * @property string $current_work_location
 * @property string $ex_apprentice
 * @property string $qualification
 * @property string $percentage_in_qualification
 * @property string $total_marks
 * @property string $wt_85
 * @property string $wt_90
 * @property string $skill_test_steno
 * @property string $skill_test_typing
 * @property string $skill_test_others
 * @property string $pst
 * @property string $pet
 * @property string $marks_written_A
 * @property string $marks_acad_B_15
 * @property string $marks_acad_B_10
 * @property string $marks_apprent_5
 * @property string $marks_apprent_0
 * @property string $totalmarks_ABC
 * @property int $id
 * @property int $reg_no
 */
class Candidates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'dob'], 'safe'],
            [['candidate_name', 'reg_no'], 'required'],
            [['reg_no'], 'integer'],
            [['category', 'venue', 'advt_no', 'post_type', 'criteria_met', 'post', 'location_of_post', 'payscale', 'class', 'discipline', 'shortlisted_as_ur', 'candidate_name', 'address_1', 'address_2', 'address_3', 'district', 'state', 'email', 'current_work_location', 'qualification'], 'string', 'max' => 256],
            [['pin', 'mobile', 'cpfno', 'percentage_in_qualification', 'total_marks', 'wt_85', 'wt_90', 'marks_written_A', 'marks_acad_B_15', 'marks_acad_B_10', 'marks_apprent_5', 'marks_apprent_0', 'totalmarks_ABC'], 'string', 'max' => 16],
            [['ex_serviceman', 'pwd', 'pwd_type', 'departmental', 'ex_apprentice', 'skill_test_steno', 'skill_test_typing', 'skill_test_others', 'pst', 'pet'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Date',
            'category' => 'Category',
            'venue' => 'Venue',
            'advt_no' => 'Advt No',
            'post_type' => 'Post Type',
            'criteria_met' => 'MeetingCriteria',
            'post' => 'Post',
            'location_of_post' => 'Location Of Post',
            'payscale' => 'Payscale',
            'class' => 'Class',
            'discipline' => 'Discipline',
            'shortlisted_as_ur' => 'Shortlisted As Ur',
            'candidate_name' => 'Candidate\'s Info',
            'dob' => 'Dob',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'address_3' => 'Address 3',
            'district' => 'District',
            'state' => 'State',
            'pin' => 'Pin',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'ex_serviceman' => 'Ex Serviceman',
            'pwd' => 'Pwd',
            'pwd_type' => 'Pwd Type',
            'departmental' => 'Departmental',
            'cpfno' => 'Cpfno',
            'current_work_location' => 'Current Work Location',
            'ex_apprentice' => 'Ex Apprentice',
            'qualification' => 'Qualification',
            'percentage_in_qualification' => 'Percentage In Qualification',
            'total_marks' => 'Total Marks',
            'wt_85' => 'Wt 85',
            'wt_90' => 'Wt 90',
            'skill_test_steno' => 'Skill Test Steno',
            'skill_test_typing' => 'Skill Test Typing',
            'skill_test_others' => 'Skill Test Others',
            'pst' => 'Pst',
            'pet' => 'Pet',
            'marks_written_A' => 'Marks Written A',
            'marks_acad_B_15' => 'Marks Acad B 15',
            'marks_acad_B_10' => 'Marks Acad B 10',
            'marks_apprent_5' => 'Marks Apprent 5',
            'marks_apprent_0' => 'Marks Apprent 0',
            'totalmarks_ABC' => 'Totalmarks Abc',
            'id' => 'ID',
            'reg_no' => 'RegNo.|Photo|Sign',
        ];
    }

    public function getPhotourl() {
        return \Yii::$app->request->BaseUrl.'/images/ongc_mgnx/ongc_photo/'.$this->reg_no.'.jpg'; 
    }

    public function getSignurl() {
        return \Yii::$app->request->BaseUrl.'/images/ongc_mgnx/ongc_sign/'.$this->reg_no.'.jpg'; 
    }

    public function getDateofbirth() {
        $dob = explode("-",$this->dob);
        $dob = $dob[2].'/'.$dob[1].'/'.$dob[0];
        return $dob;
    }

    public function getFulladdress() {
        return $this->address_1.', '.$this->address_2.', '.$this->address_3;
    }

    public function getContactno() {
        return $this->mobile;
    }

    public function getCandidateemail() {
        return $this->email;
    }

    public function getCandidatequalification() {
        return $this->qualification;
    }

    public function getCandidatepercentageinqualification() {
        return $this->percentage_in_qualification;
    }
}