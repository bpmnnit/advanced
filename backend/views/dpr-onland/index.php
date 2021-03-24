<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\FieldParties;
use backend\models\Si;
use backend\models\Regions;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DprOnlandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Onland DPR';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpr-onland-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create DPR', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['class' => 'text-right', 'style' => 'width: 20px;'],],
            [
              'attribute' => 'dpr_date',
              'value' => 'dpr_date',
              'format' => 'raw',
              'filter' => DatePicker::widget([
                  'model' => $searchModel,
                  'attribute' => 'dpr_date',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                      'todayHighlight' => true,
                  ],
              ]),
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 60px;'],
            ],
            [
                'attribute' => 'dpr_field_party',
                'format' => 'html',
                'value' => function($model) {
                    return Html::a($model->dprFieldParty->field_party_name, ['field-parties/view', 'id' => $model->dpr_field_party], ['data-pjax' => '0']);
                },
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 160px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'FP Name...'
                ]
            ],
            [
              'attribute' => 'dpr_region',
              'format' => 'html',
              'label' => 'Region',
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right'],
              'filterInputOptions' => [
                'class' => 'form-control',
                'placeholder' => 'Region...',
              ],
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'dpr_region',
                'data' => Arrayhelper::map(Regions::find()->all(), 'region_name', 'region_name'),
                'options' => ['placeholder' => 'Filter by Region...'],
                'language' => 'en',
                'pluginOptions' => [
                  'allowClear' => true,
                ],
              ]),
            ],
            [
              'attribute' => 'dpr_area',
              'format' => 'html',
              'label' => 'Area',
              'value' => function($model) {
                return Html::a($model->dpr_area, ['si/view', 'id' => $model->dpr_si], ['data-pjax' => '0']);
              },
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right'],
              'filterInputOptions' => [
                'class' => 'form-control',
                'placeholder' => 'Area...',
              ],
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'dpr_area',
                'data' => Arrayhelper::map(Si::find()->all(), 'si_area', 'si_area'),
                'options' => ['placeholder' => 'Filter by Area...'],
                'language' => 'en',
                'pluginOptions' => [
                  'allowClear' => true,
                ],
              ]),
            ],
            [
              'attribute' => 'dpr_si_no',
              'format' => 'html',
              'label' => 'SI No.',
              'value' => function($model) {
                return Html::a($model->dpr_si_no, ['si/view', 'id' => $model->dpr_si], ['data-pjax' => '0']);
              },
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 200px;'],
              'filterInputOptions' => [
                'class'       => 'form-control',
                'placeholder' => 'SI No...'
              ],
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'dpr_si_no',
                'data' => Arrayhelper::map(Si::find()->all(), 'si_no', 'si_no'),
                'options' => ['placeholder' => 'Filter by SI No...'],
                'language' => 'en',
                'pluginOptions' => [
                  'allowClear' => true,
                ],
              ]),
            ],
            [
                'attribute' => 'dpr_shots_acc',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 30px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'Acc...'
                ]
            ],
            [
                'attribute' => 'dpr_shots_rej',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 30px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'Rej...'
                ]
            ],
            [
                'attribute' => 'dpr_shots_skip',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 30px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'Skip...'
                ]
            ],
            [
                'attribute' => 'dpr_shots_rep',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 30px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'Rep...'
                ]
            ],
            [
                'attribute' => 'dpr_shots_rec',
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 30px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'Rec...'
                ]
            ],
            [
              'attribute' => 'dpr_coverage_shots',
              'headerOptions' => ['class' => 'text-right'],
              'contentOptions' => ['class' => 'text-right', 'style' => 'width: 30px;'],
              'filterInputOptions' => [
                'class'       => 'form-control',
                'placeholder' => 'Coverage Shots...'
              ]
          ],
            [
                'attribute' => 'dpr_coverage',
                'format' => ['decimal', 4],
                'headerOptions' => ['class' => 'text-right'],
                'contentOptions' => ['class' => 'text-right', 'style' => 'width: 60px;'],
                'filterInputOptions' => [
                  'class'       => 'form-control',
                  'placeholder' => 'Coverage...'
                ]
            ],
            [
              'attribute' => 'dpr_remarks',
              'filterInputOptions' => [
                'class'       => 'form-control',
                'placeholder' => 'Remarks...'
              ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
