<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Candidates */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Candidates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="candidates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'date',
            'category',
            'venue',
            'advt_no',
            'post_type',
            'criteria_met',
            'post',
            'location_of_post',
            'payscale',
            'class',
            'discipline',
            'shortlisted_as_ur',
            'candidate_name',
            'dob',
            'address_1',
            'address_2',
            'address_3',
            'district',
            'state',
            'pin',
            'mobile',
            'email:email',
            'ex_serviceman',
            'pwd',
            'pwd_type',
            'departmental',
            'cpfno',
            'current_work_location',
            'ex_apprentice',
            'qualification',
            'percentage_in_qualification',
            'total_marks',
            'wt_85',
            'wt_90',
            'skill_test_steno',
            'skill_test_typing',
            'skill_test_others',
            'pst',
            'pet',
            'marks_written_A',
            'marks_acad_B_15',
            'marks_acad_B_10',
            'marks_apprent_5',
            'marks_apprent_0',
            'totalmarks_ABC',
            'id',
            'reg_no',
        ],
    ]) ?>

</div>
