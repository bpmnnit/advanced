<?php

namespace backend\modules\api\controllers;

use yii\web\Controller;
use backend\models\DprOnland;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{

	public $enableCsrfValidation = false;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDprOnland() {
    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    	$dpr_onland = DprOnland::find()->all();

    	if(count($dpr_onland) > 0) {
    		return arrar('status' => true, 'data' => $dpr_onland);
    	} else {
    		return array('status' => false, 'data' => 'No employees found.');
    	}

    }

}
