<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $id_pendaki
 * @property int $id_user_role
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 *
 *
 * @property mixed $userRole
 * @property string $labelStatus
 * @property string $authKey
 * @property string $stringStatus
 */
class User extends ActiveRecord implements IdentityInterface
{
    const AKTIF = 10;
    const TIDAK_AKTIF = 20;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username','unique'],
            [['id_pendaki', 'id_user_role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_user_role', 'username', 'auth_key', 'password', 'email', 'created_at', 'updated_at'], 'required'],
            [['username', 'password', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['status','default','value' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pendaki' => Yii::t('app', 'Id Pendaki'),
            'id_user_role' => Yii::t('app', 'Id User Role'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time(),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getStringStatus()
    {
        if ($this->status === static::AKTIF) {
            return 'Aktif';
        } else {
            return 'Tidak Aktif';
        }
    }

    public function getLabelStatus()
    {
        if ($this->status === static::AKTIF) {
            return '<span class="label label-success">'.$this->stringStatus.'</span>';
        } else {
            return '<span class="label label-danger">'.$this->stringStatus.'</span>';
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getUserRole()
    {
        return $this->hasOne(UserRole::className(),['id' => 'id_user_role']);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    /**
     * Removes password reset token
     */

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return bool
     */
    public static function isAdmin()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id_user_role === UserRole::ADMIN){
                return true;
            }
        }
        return false;  
    }

    /**
     * @return bool
     */
    public static function isPendaki()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id_user_role === UserRole::PENDAKI){
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isPetugas()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->id_user_role === UserRole::PETUGAS){
                return true;
            }
        }
        return false;
    }

    public static function findBySession()
    {
        $query = User::find();
        $query->andWhere('username = :username',[':username'=>Yii::$app->user->identity->username]);

        return $query->one();
    }

}
