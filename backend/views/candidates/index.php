<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CandidatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Candidates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidates-index">

    <p class="pull-left"><?= Html::img('images/ONGC_Logo.svg', array('width' => '70px', 'style' => 'margin-right: 10px;')); ?></p>

    <p class="pull-left">Date:<br>Applied Category: <strong>UR/OBC/SC/ST/EWS</strong><br>Venue: <strong>XYZ </strong>Location of Post- <strong>WOU, Mumbai</strong></p>

    <p class="pull-right">
        Oil and Natural Gas Corporation Limited<br>Particulars of the candidates who were shortlisted against<br>Advt. No. <strong>04/2018(R&amp;P)</strong><br><strong>(For Non-Executives)</strong> 
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'reg_no',
                'format' => 'html',
                'value' => function($data) {
                    return $data['reg_no'].'<br>'.Html::img($data['photourl'], ['width' => '90px']).'<br>'.Html::img($data['signurl'], ['width' => '90px']);
                },
            ],
            [
                'attribute' => 'candidate_name',
                'format' => 'html',
                'value' => function($data) {
                    return $data['candidate_name'].'<br>'.$data['dateofbirth'].'<br>'.$data['fulladdress'].'<br>'.$data['contactno'].'<br>'.$data['candidateemail'];
                },
            ],
            [
                'attribute' => 'qualification',
                'format' => 'html',
                'value' => function($data) {
                    return $data['candidatequalification'].'<br>'.$data['candidatepercentageinqualification'];
                },
            ],
            //'venue',
            //'advt_no',
            //'post_type',
            'criteria_met',
            //'post',
            //'location_of_post',
            //'payscale',
            //'class',
            //'discipline',
            //'shortlisted_as_ur',
            //'dob',
            //'address_1',
            //'address_2',
            //'address_3',
            //'district',
            //'state',
            //'pin',
            //'mobile',
            //'email:email',
            //'ex_serviceman',
            //'pwd',
            //'pwd_type',
            //'departmental',
            //'cpfno',
            //'current_work_location',
            //'ex_apprentice',
            //'percentage_in_qualification',
            //'total_marks',
            //'wt_85',
            //'wt_90',
            //'skill_test_steno',
            //'skill_test_typing',
            //'skill_test_others',
            //'pst',
            //'pet',
            //'marks_written_A',
            //'marks_acad_B_15',
            //'marks_acad_B_10',
            //'marks_apprent_5',
            //'marks_apprent_0',
            //'totalmarks_ABC',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
