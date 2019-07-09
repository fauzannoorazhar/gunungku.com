<?php

namespace app\controllers;

use Yii;
use app\models\ChangePasswordForm;
use app\models\SetPasswordForm;
use app\models\User;
use app\models\UserSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex($id_user_role)
    {
        $searchModel = new UserSearch();
        $searchModel->id_user_role = $id_user_role;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->get('export')) {
            return $this->exportExcel(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_user_role)
    {
        $model = new User(['scenario' => User::SCENARIO_CREATE]);
        $model->id_user_role = $id_user_role;

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            if($model->validate()) {
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $model->save(false);
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');

        }

        return $this->render('create', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            if($model->save())
            {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        }

        return $this->render('update', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model->delete()) {
            Yii::$app->session->setFlash('success','Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error','Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionSetPassword($id)
    {
        $user = $this->findModel($id);

        $model = new SetPasswordForm;

        if(isset($_POST['SetPasswordForm']))
        {
            $model->attributes = $_POST['SetPasswordForm'];

            if($model->validate())
            {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);

                if($user->save())
                {
                    \Yii::$app->session->setFlash('success','Password berhasil disimpan');

                    return $this->redirect(['user/set-password','id'=>$id]);
                } else {
                    print_r($user->getErrors());
                }

            }
        }

        return $this->render('setPassword', [
            'model' => $model,
        ]);
    }
    public function actionChangePassword()
    {
        $query = User::find();
        $query->andWhere(['username'=>Yii::$app->user->identity->username]);

        $user = $query->one();

        $model = new ChangePasswordForm;

        if($model->load(Yii::$app->request->post()))
        {
            $model->attributes = $_POST['ChangePasswordForm'];
        
            if($model->validate()) 
            {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password_baru);    

                if($user->save())
                {
                    Yii::$app->session->setFlash('success','Password berhasil diperbarui');
                    return $this->redirect(['satker/profil']);
                } else {
                    print_r($user->getErrors());
                }
                
            }
        }

        return $this->render('changePassword', [
            'model' => $model,
        ]);
    }    

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
