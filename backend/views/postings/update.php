<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Postings */

$this->title = 'Update Postings for: ' . $model->postingCpf->manpower_name;
$this->params['breadcrumbs'][] = ['label' => 'Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->postingCpf->manpower_name, 'url' => ['view', 'id' => $model->posting_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="postings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
