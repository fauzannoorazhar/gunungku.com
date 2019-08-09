<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "gunung".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property int $ketinggian
 * @property int $id_jenis_gunung
 * @property int $status_aktif
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status_hapus
 * @property int $kuota
 * @property string $deskripsi_izin
 * @property string $deskripsi_wajib
 * @property string $deskripsi_dilarang
 * @property string $deskripsi_sanksi
 * @property string $slug
 * @property string $deskripsi_kontak
 * @property string $link_website
 * @property string $link_map
 * @property string $gambar
 * @property string $lokasi
 *
 * @property JenisGunung $jenisGunung
 * @property string $statusGunungAktif
 * @property string $statusGunung
 * @property string $ketinggianMdpl
 * @property GunungJalur $manyGunungJalur
 * @property User $userCreate
 * @property string $pathGambar
 * @property string $labelStatus
 * @property integer $countJalurPos
 * @property GunungJalurPos $manyGunungJalurPos
 * @property integer $countGunungJalur
 */
class Gunung extends \yii\db\ActiveRecord
{
    use ListableTrait;

    const GUNUNG_AKTIF = 10;
    const GUNUNG_NON_AKTIF = 20;

    const DIBUKA = 10;
    const DITUTUP = 20;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gunung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nama','unique'],
            [['nama', 'deskripsi', 'ketinggian', 'id_jenis_gunung','status_aktif', 'status'], 'required'],
            [['deskripsi', 'deskripsi_izin', 'deskripsi_wajib', 'deskripsi_dilarang', 'deskripsi_sanksi', 'deskripsi_kontak','slug'], 'string'],
            [['ketinggian', 'id_jenis_gunung', 'status_aktif', 'status', 'kuota'], 'integer'],
            [['nama','link_website','link_map','gambar','lokasi'], 'string', 'max' => 255],
            [['link_website','link_map'],'url'],

            [['created_at','updated_at','created_by','updated_by'], 'integer'],
            ['status_hapus','default','value' => 0],
            ['gambar','safe'],
            [['gambar'], 'file', 'extensions' => 'jpg, png', 'skipOnEmpty' => true],
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
                 'class' => BlameableBehavior::className(),
                 'createdByAttribute' => 'created_by',
                 'updatedByAttribute' => 'updated_by',
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
            'deskripsi' => Yii::t('app', 'Deskripsi'),
            'ketinggian' => Yii::t('app', 'Ketinggian'),
            'id_jenis_gunung' => Yii::t('app', 'Jenis Gunung'),
            'status_aktif' => Yii::t('app', 'Status Gunung'),
            'status' => Yii::t('app', 'Status'),
            'kuota' => Yii::t('app', 'Kuota Pendaki'),
            'deskripsi_izin' => Yii::t('app', 'Deskripsi Izin'),
            'deskripsi_wajib' => Yii::t('app', 'Deskripsi Wajib'),
            'deskripsi_dilarang' => Yii::t('app', 'Deskripsi Dilarang'),
            'deskripsi_sanksi' => Yii::t('app', 'Deskripsi Sanksi'),
            'deskripsi_kontak' => Yii::t('app', 'Deskripsi Kontak'),
            'created_at' => Yii::t('app', 'Dibuat Pada'),
            'updated_at' => Yii::t('app', 'Dirubah Pada'),
        ];
    }

    public static function find()
    {
        $query = parent::find();
        $query->andWhere('gunung.status_hapus IS NULL OR gunung.status_hapus = 0');

        return $query;
    }

    public function getUserCreate()
    {
        return $this->hasOne(User::class,['id' => 'created_by']);
    }

    public function getJenisGunung()
    {
        return $this->hasOne(JenisGunung::class,['id' => 'id_jenis_gunung']);
    }

    public function getManyGunungJalur()
    {
        return $this->hasMany(GunungJalur::class,['id_gunung' => 'id']);
    }

    public function getCountGunungJalur()
    {
        return count($this->manyGunungJalur);
    }

    public function getCountKuotaJalur($tanggal=null)
    {
        $query = $this->getManyGunungJalur()
            ->joinWith('manyGunungKuota');

        if (is_null($tanggal)) {
            $count = $query->sum('gunung_kuota.kuota');
        } else {
            $count = $query->andWhere(['gunung_kuota.tanggal' => $tanggal])->sum('gunung_kuota.kuota');
        }

        return $count ?? 0;
    }

    public function getManyGunungJalurPos()
    {
        return $this->hasMany(GunungJalurPos::class,['id_gunung_jalur' => 'id'])->via('manyGunungJalur');
    }

    public function getCountJalurPos()
    {
        return count($this->manyGunungJalurPos);
    }

    public function getKetinggianMdpl()
    {
        return $this->ketinggian.' MDPL';
    }

    public function getStatusGunungAktif()
    {
        if ($this->status_aktif == self::GUNUNG_AKTIF) {
            return 'Aktif';
        } else {
            return 'Tidak Aktif';
        }
    }

    public function getStatusGunung()
    {
        if ($this->status == self::DIBUKA) {
            return 'Dibuka';
        } else {
            return 'Ditutup';
        }
    }

    public function getDeskripsiTruncate($lenght=250)
    {
        return StringHelper::truncate($this->deskripsi, $lenght);
    }

    /**
     * @var $uploadedFile UploadedFile
     */
    public function upload($gambar_lama=null)
    {
        $uploadedFile = UploadedFile::getInstance($this, 'gambar');

        if (is_object($uploadedFile)) {
            $this->gambar = $uploadedFile->basename;
            $this->gambar .= '.' . $uploadedFile->extension;

            $path = Yii::getAlias('@app').'/web/uploads/'.$this->gambar;
            $uploadedFile->saveAs($path, false);

            if ($this->isFileExist($gambar_lama)) {
                $this->hapusFoto($gambar_lama);
            }
        } else {
            $this->gambar = $gambar_lama;
        }
    }

    public function isFileExist($filename)
    {
        $file = Yii::getAlias('@app').'/web/uploads/'.$filename;

        if ($this->gambar !== null AND is_file($file)) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusFoto($filename)
    {
        if ($this->isFileExist($filename)) {
            $file = Yii::getAlias('@app').'/web/uploads/'.$filename;
            unlink($file);
        }
    }

    public function getGambar($htmlOptions=[])
    {
        if ($this->isFileExist($this->gambar)) {
            return Html::img('@web/uploads/'. $this->gambar,$htmlOptions);
        } else  {
            return Html::img("@web/images/noimage.jpg", $htmlOptions);
        }
    }

    public function getPathGambar()
    {
        if ($this->isFileExist($this->gambar)) {
            return Yii::getAlias('@web').'/uploads/'. $this->gambar;
        } else  {
            return Yii::getAlias('@web').'/images/noimage.jpg';
        }
    }

    public function getLabelStatus()
    {
        if ($this->status == self::DIBUKA) {
            return 'rent-notic';
        } else {
            return 'sale-notic';
        }
    }
}
