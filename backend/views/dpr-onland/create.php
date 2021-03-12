<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DprOnland */

$this->title = 'Create Onland DPR';
$this->params['breadcrumbs'][] = ['label' => 'Onland DPR', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpr-onland-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
