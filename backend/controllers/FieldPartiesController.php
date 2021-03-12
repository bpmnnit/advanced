<?php

namespace backend\controllers;

use Yii;
use backend\models\FieldParties;
use backend\models\DprOnland;
use backend\models\FieldPartiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * FieldPartiesController implements the CRUD actions for FieldParties model.
 */
class FieldPartiesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'only' => ['index', 'view', 'create', 'update', 'delete'],
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'actions' => ['index', 'view', 'create', 'update', 'delete'],
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
        ];
    }

    /**
     * Lists all FieldParties models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FieldPartiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FieldParties model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $que = "SELECT * FROM dpr_onland WHERE dpr_field_party = $id AND dpr_date BETWEEN '2018-11-13' AND '2018-11-20'";
        $dpr = DprOnland::findBySql('SELECT * FROM dpr_onland WHERE dpr_field_party ='.$id)->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dpr' => $dpr,
            'que' => $que,
        ]);
    }

    /**
     * Creates a new FieldParties model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FieldParties();

        if ($model->load(Yii::$app->request->post())) {
            $model->field_party_name = strtoupper($model->field_party_name);
            $model->save();
            return $this->redirect(['view', 'id' => $model->field_party_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FieldParties model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->field_party_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FieldParties model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FieldParties model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FieldParties the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FieldParties::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
