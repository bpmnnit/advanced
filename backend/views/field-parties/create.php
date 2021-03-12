<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FieldParties */

$this->title = 'Create Field Parties';
$this->params['breadcrumbs'][] = ['label' => 'Field Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-parties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
