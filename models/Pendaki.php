<?php

namespace app\models;

use Yii;

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
 */
class Pendaki extends \yii\db\ActiveRecord
{
    use ListableTrait;

    const PRIA = 10;
    const WANITA = 20;

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
            [['nik','nama','email','nomor_telpon'],'unique'],
            [['nama', 'nik', 'jenis_kelamin', 'tanggal_lahir', 'nomor_telpon', 'nomor_kerabat','email'], 'required'],
            [['nik', 'jenis_kelamin', 'id_provinsi', 'id_kabupaten'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama', 'email', 'file_pengenal'], 'string', 'max' => 255],
            ['file_pengenal','default','value' => null],
            //['email','email'],
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
            'nik' => Yii::t('app', 'Nik'),
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

    public function getNamaJenisKelamin()
    {
        if ($this->jenis_kelamin == self::PRIA) {
            return 'Laki - Laki';
        } else {
            return 'Perempuan';
        }
    }
}
