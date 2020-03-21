<?php

namespace app\modules\api\controllers;


use yii\rest\ActiveController;
use yii\web\Response;

class GunungController extends ActiveController
{
    public $modelClass = 'app\modules\api\models\Gunung';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }
}
