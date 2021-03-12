<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Offdpr */

$this->title = 'Create Offdpr';
$this->params['breadcrumbs'][] = ['label' => 'Offdprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offdpr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
