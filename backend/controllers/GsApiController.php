<?php 

namespace backend\controllers;

use yii\rest\ActiveController;
use backend\models\DprOnland;
use backend\models\FieldParties;

class GsApiController extends ActiveController {

	public $modelClass = 'backend\models\DprOnland';

	public function actionListdpr() {

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		
		$data = DprOnland::find()->all();

    	if(count($data) > 0) {
    		return array('status' => true, 'data' => $data);
    	} else {
    		return array('status' => false, 'data' => 'No data found.');
    	}
	}

	public function actionListdprByDate($dpr_date) {

		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$data = DprOnland::find()->where(['dpr_date' => $dpr_date])->orderBy(['dpr_id' => SORT_ASC])->all();

    	if($data) {
    		return array('status' => true, 'data' => $data);
    	} else {
    		return array('status' => false, 'data' => 'No data found.');
    	}
    }

    public function actionListdprByFp($fp) {
		
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    	$fp = strtoupper($fp);
    	$fp_id = FieldParties::find()->where(['field_party_name' => $fp])->one()->field_party_id;
    	
		$data = DprOnland::find()->where(['dpr_field_party' => $fp_id])->orderBy(['dpr_date' => SORT_DESC])->all();

    	if($data) {
    		return array('status' => true, 'data' => $data);
    	} else {
    		return array('status' => false, 'data' => 'No data found.');
    	}
    }

}
