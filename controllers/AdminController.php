<?php

namespace app\controllers;

use app\models\ImportForm;
use app\models\PekerjaanSearch;
use Yii;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Pekerjaan;
use app\models\SatkerSearch;
use app\models\Unit;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index','subcat'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImport()
    {
        $importForm = new ImportForm();

        if ($importForm->load(Yii::$app->request->post()) && $importForm->validate()) {
            if ($importForm->uploadFile()) {
                Yii::$app->session->setFlash('success','Import Berhasil');
                return $this->redirect(['pekerjaan/index']);
            }
        }

        return $this->render('_form-import',[
            'importForm' => $importForm
        ]);
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $id_satker = $parents[0];

                $out = self::getSubCatList($id_satker);


                echo Json::encode(['output' => $out, 'selected'=>'']);
                return;

            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function getSubCatList($id_satker)
    {
        foreach (Unit::find()->andWhere(['id_satker' => $id_satker])->all() as $unit) {
            $list[] = [
                'id' => $unit->id, 'name' => $unit->nama
            ];
        }

        return $list;
    }
}
