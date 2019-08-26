<?php

namespace backend\controllers;

use Yii;
use backend\models\Surveys;
use backend\models\SurveysSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SurveysController implements the CRUD actions for Surveys model.
 */
class SurveysController extends Controller
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
        ];
    }

    /**
     *  Lists all Surveys models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SurveysSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Surveys model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Surveys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Surveys();

        if ($model->load(Yii::$app->request->post())) {

            $model->survey_file = UploadedFile::getInstance($model, 'survey_file');
            if (!is_null($model->survey_file) && $model->upload()) {
                // file is uploaded successfully. Now save the upload link.
                $model->survey_information = 'uploads/' . $model->survey_file->baseName . '.' . $model->survey_file->extension;
            }
            $model->survey_create_date = date('Y-m-d');
            $model->survey_file = null;
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->survey_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Surveys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->survey_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Surveys model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $data = Surveys::findOne($id);
        unlink(Yii::getAlias('@backend/').'web/'.$data->survey_information);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Surveys model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Surveys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Surveys::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDownload($survey_id) {
        $download = Surveys::findOne($survey_id);
        $path = Yii::getAlias('@webroot/').$download->survey_information;

        if(file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        } else {
            throw new NotFoundHttpException('The requested survey document does not exist.');
        }
    }
}
