<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pendaki".
 *
 * @property int $id
 * @property string $nama
 * @property int $nik
 * @property int $jenis_kelamin
 * @property string $tanggal_lahir
 * @property int $nomor_telpon
 * @property int $nomor_kerabat
 * @property string $email
 * @property string $alamat
 * @property int $id_provinsi
 * @property int $id_kabupaten
 * @property string $namaJenisKelamin
 * @property string $file_pengenal
 * @property int $created_at
 * @property int $updated_at
 * @property int $status_hapus
 * @property string $slug
 *
 *
 * @property integer $countPendakigunung
 * @property User $user
 * @property PendakiGunung $manyPendakiGunung
 */
class Pendaki extends \yii\db\ActiveRecord
{
    use ListableTrait;

    public $password;

    const PRIA = 10;
    const WANITA = 20;

    const SCENARIO_REGISTRASI = 'regis';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'unique','targetClass' => User::class, 'targetAttribute' => ['email']],
            //[['email'],'exist','targetClass' => User::class,'targetAttribute' => ['email' => 'username'],'message' => 'Email Telah Terdaftar!'],
            [['nik','nama','email','nomor_telpon'],'unique'],
            [['nama', 'nik', 'jenis_kelamin', 'tanggal_lahir', 'nomor_telpon','email','password'], 'required'],
            [['jenis_kelamin', 'id_provinsi', 'id_kabupaten'], 'integer'],
            [['tanggal_lahir','nomor_kerabat'], 'safe'],
            [['alamat'], 'string'],
            [['nik', 'nama', 'email', 'file_pengenal','password'], 'string', 'max' => 255],
            ['file_pengenal','default','value' => null],
            //['email','email'],
            ['slug','safe'],

            [['created_at','updated_at'],'integer'],
            ['status_hapus','default','value' => 0],
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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'nama',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'nik' => Yii::t('app', 'NIK'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'nomor_telpon' => Yii::t('app', 'Nomor Telpon'),
            'nomor_kerabat' => Yii::t('app', 'Nomor Kerabat'),
            'email' => Yii::t('app', 'Email'),
            'alamat' => Yii::t('app', 'Alamat'),
            'id_provinsi' => Yii::t('app', 'Id Provinsi'),
            'id_kabupaten' => Yii::t('app', 'Id Kabupaten'),
            'file_pengenal' => Yii::t('app', 'File Pengenal'),
        ];
    }

    public function getManyPendakiGunung()
    {
        return $this->hasMany(PendakiGunung::class,['id_pendaki' => 'id']);
    }

    public function getCountPendakigunung()
    {
        return count($this->manyPendakiGunung);
    }

    public function getUser()
    {
        return $this->hasOne(User::class,['id_pendaki' => 'id']);
    }

    public function getNamaJenisKelamin()
    {
        if ($this->jenis_kelamin == self::PRIA) {
            return 'Laki - Laki';
        } else {
            return 'Perempuan';
        }
    }

    public static function find()
    {
        $query = parent::find();
        $query->andWhere('status_hapus IS NULL OR status_hapus = 0');

        return $query;
    }

    public function createUser()
    {
        $user = User::find()->andWhere(['username' => $this->email])->one();

        if ($user === null) {
            $model = new User();
            $model->username = $this->email;
            $model->setPassword($this->password);
            $model->email = $this->email;
            $model->id_pendaki = $this->id;
            $model->id_user_role = UserRole::PENDAKI;
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->save(false);
        }
    }
}
