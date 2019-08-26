<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Postings */

$this->title = 'Create Postings';
$this->params['breadcrumbs'][] = ['label' => 'Postings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
