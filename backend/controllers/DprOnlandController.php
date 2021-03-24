<?php

namespace backend\controllers;

use Yii;
use backend\models\DprOnland;
use backend\models\DprOnlandSearch;
use backend\models\Si;
use backend\models\Regions;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DprOnlandController implements the CRUD actions for DprOnland model.
 */
class DprOnlandController extends Controller
{
    public $isUpdate = false;
    private $modelSig = null;

    public function beforeAction($action) {
      if(Yii::$app->session->has('modelSig')) {
        $this->modelSig = Yii::$app->session['modelSig'];
      }
      return parent::beforeAction($action);
    }

    public function afterAction($action,$params) {
        Yii::$app->session['modelSig'] = $this->modelSig;
        return parent::afterAction($action,$params);
    }

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
        'access' => [
          'class' => AccessControl::className(),
          'only' => ['index', 'view', 'create', 'update', 'delete'],
          'rules' => [
            [
              'allow' => true,
              'roles' => ['@'],
            ],
          ],
        ],
      ];
    }

    /**
     * Lists all DprOnland models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DprOnlandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize = 40;
        $dataProvider->sort = ['defaultOrder' => ['dpr_date' => 'DESC']];
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DprOnland model.
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
     * Creates a new DprOnland model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new DprOnland();
      $this->isUpdate = false;
      if ($model->load(Yii::$app->request->post())) {

        $model->dpr_si_no = $model->dprSi->si_no;
        $model->dpr_area = $model->dprSi->si_area;
        $region_id = $model->dprSi->si_region;
        $model->dpr_region = Regions::findOne($region_id)->region_name;
        
        $model->save();
        
        return $this->redirect(['view', 'id' => $model->dpr_id]);
      }

      return $this->render('create', [
        'model' => $model,
      ]);
    }

    /**
     * Updates an existing DprOnland model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
      $model = $this->findModel($id);
      $this->isUpdate = true;
      $this->modelSig = $model->dpr_si;
      Yii::$app->session->set('modelSig', $this->modelSig);
      if ($model->load(Yii::$app->request->post())) {
        $model->dpr_si_no = $model->dprSi->si_no;
        $model->dpr_area = $model->dprSi->si_area;
        $region_id = $model->dprSi->si_region;
        $model->dpr_region = Regions::findOne($region_id)->region_name;
        
        $model->save();
        
        return $this->redirect(['view', 'id' => $model->dpr_id]);
      }

      return $this->render('update', [
          'model' => $model,
      ]);
    }

    /**
     * Deletes an existing DprOnland model.
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

    public function actionMaxsigdate() {
        $sig_id = $_POST['sig_id'];
        $ret = self::getSigMaxDate($sig_id);
        print_r($ret[0]['max_date']);
        //return $ret;
    }

    public function getSigMaxDate($sig_id) {
      $connection = Yii::$app->getDb();
      $command = $connection->createCommand("SELECT max(dpr_date) as max_date FROM cgsdb.dpr_onland where dpr_onland.dpr_si = $sig_id");
      $result = $command->queryAll();
      return $result;
    }

    public function actionSig() {
      Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
      $out = [];
      if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
          $fp_id = $parents[0];
          $out = self::getSigList($fp_id);
          return ['output' => $out, 'selected' => self::getUpdateStatus() ? Yii::$app->session->get('modelSig') : ''];
        }
      }
      return ['output' => '', 'selected' => ''];
    }

    public function actionSigcf() {
      $sig_id = $_POST['sig_id'];
      $ret = self::getSigconversionFactor($sig_id);
      print_r($ret[0]['cf']);
      //return $ret;
    }

    public function getSigconversionFactor($sig_id) {
      $connection = Yii::$app->getDb();
      $command = $connection->createCommand("SELECT si_conversion_factor AS cf FROM cgsdb.si WHERE si_id = $sig_id");
      $result = $command->queryAll();
      return $result;
    }

    public function getModelSig() {
      return $this->modelSig;
    }

    public function getUpdateStatus() {
      return $this->isUpdate;
    }
    
    public function getSigList($fp_id) {
      $connection = Yii::$app->getDb();
      //$command = $connection->createCommand("SELECT si_id, concat(si_area, '(', si_no, ')') as areas FROM cgsdb.si where si.si_fp = $fp_id)");
      $command = $connection->createCommand("SELECT si_id, concat(si_area, '(', si_no, ')') as areas FROM cgsdb.si where si.si_fp = (select field_parties.field_party_id from field_parties where field_parties.field_party_id = $fp_id) ORDER BY si_start_date DESC");
      // $command = $connection->createCommand("SELECT si_id, concat(si_area, '(', si_no, ')') as areas, MAX(dpr_date) AS max_dt FROM cgsdb.si INNER JOIN dpr_onland ON si.si_fp = dpr_onland.dpr_field_party where si.si_fp = (select field_parties.field_party_id from field_parties where field_parties.field_party_id = $fp_id) GROUP BY si_id ORDER BY max_dt DESC");
      $result = $command->queryAll();
      $arr = array();
      foreach ($result as $r) {
        $arr[] = array('id' => $r['si_id'], 'name' => $r['areas']);  
      }
      return $arr;           
    }

    /**
     * Finds the DprOnland model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DprOnland the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
      if (($model = DprOnland::findOne($id)) !== null) {
        return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
    }
}
