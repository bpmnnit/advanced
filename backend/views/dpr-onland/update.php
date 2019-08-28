<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */

$this->title = 'Update DPR of ' . $model->dprFieldParty->field_party_name. '. Date: '.$model->dpr_date.'.';
$this->params['breadcrumbs'][] = ['label' => 'Onland DPR', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dpr_date, 'url' => ['view', 'id' => $model->dpr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dpr-onland-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
