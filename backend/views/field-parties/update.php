<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldParties */

$this->title = 'Update Field Party: ' . $model->field_party_name;
$this->params['breadcrumbs'][] = ['label' => 'Field Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->field_party_name, 'url' => ['view', 'id' => $model->field_party_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="field-parties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
