<?php

namespace app\controllers;

use app\models\Gunung;
use app\models\GunungSearch;
use app\models\Pendaki;
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
use yii\helpers\VarDumper;
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

    public function actionRegistrasi()
    {
        $this->layout = "//backend/main-login";
        $model = new Pendaki();

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {
            $referrer = $_POST['referrer'];

            if ($model->save()) {
                $model->createUser();
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['site/index']);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        }

        return $this->render('registrasi', [
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function actionDetailGunung($slug)
    {
        $this->layout = Yii::getAlias('@main-detail-frontend');
        $gunung = $this->findGunungBySlug($slug);

        $dataProvider = new ActiveDataProvider([
            'query' => $gunung->getManyGunungJalur(),
        ]);

        return $this->render('detail-gunung',[
            'gunung' => $gunung,
            'dataProvider' => $dataProvider
        ]);
    }

    protected function findGunungBySlug($slug)
    {
        if (($model = Gunung::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = "//backend/main-login";

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

        return $this->redirect(['site/index']);
    }
}
