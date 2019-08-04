<?php

namespace app\controllers;

use app\models\GunungSearch;
use Yii;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\TbDokter;
use app\models\TbPasien;
use app\models\Unduhan;
use app\models\Unit;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [               
                    [
                        'actions' => ['logout','index','dev'],
                        'allow' => true,
                        'roles' => ['@','?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $this->layout = Yii::getAlias('@main-frontend');

        return $this->render('index');
    }

    public function actionPendaftaranOnline()
    {
        $this->layout = Yii::getAlias('@main-detail-frontend');

        $searchModel = new GunungSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pendaftaran-online', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays kontak page.
     *
     * @return Response|string
     */
    public function actionKontak()
    {
        $this->layout = '//frontend/main-frontend-view';

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('kontak', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = '//backend/main-login';

        $model = new LoginForm();

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['admin/index']);
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (User::isAdmin()) {
                return $this->redirect(['admin/index']);
            }

        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDev()
    {
        $datetime = new \DateTime();
        $datetime->modify('+5 day');
        $tanggalAwal = $datetime->format('Y-m-d');
        $datetime->modify('+1 month');
        $tanggalAkhir = $datetime->format('Y-m-d');

        $array;

        while (strtotime($tanggalAwal) <= strtotime($tanggalAkhir)) {
            $array[] = $tanggalAwal;
            $tanggalAwal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggalAwal)));
        }

        return $array;
    }
}
