<?php

namespace app\controllers;

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
                        'actions' => ['logout','index','pasien-list','pasien-rm-list','dokter-list','dev'],
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
        return $this->redirect(['admin/index']);

        //return $this->render('index');
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

    public function actionPasienRmList($q = null, $id = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(['concat(no_rm_pas, " - ",nm_pas) as text', 'id_pas as id'])
                ->from('tb_pasien')
                ->andFilterWhere(['like', 'no_rm_pas', $q])
                ->limit(35);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => TbPasien::find($id)->nm_pas];
        }

        return $out;
    }

    public function actionPasienList($q = null, $id = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_pas AS id, nm_pas AS text')
                ->from('tb_pasien')
                ->where(['like', 'nm_pas', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => TbPasien::find($id)->nm_pas];
        }

        return $out;
    }

    public function actionDokterList($q = null, $id = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_dok AS id, nm_dok AS text')
                ->from('tb_dokter')
                ->where(['like', 'nm_dok', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => TbDokter::find($id)->nm_dok];
        }

        return $out;
    }

    public function actionDev()
    {
        $query = new Query;
        $query->select(['concat(no_rm_pas, " - ",nm_pas) as text', 'id_pas as id'])
            ->from('tb_pasien')
            ->andWhere(['like', 'nm_pas', 'aas'])
            ->andWhere(['like', 'no_rm_pas', 005])
            ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);

        print_r($data);
    }
}
