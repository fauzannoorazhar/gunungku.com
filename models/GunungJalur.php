<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "gunung_jalur".
 *
 * @property int $id
 * @property int $id_gunung
 * @property string $nama
 * @property string $jarak_puncak
 * @property string $jam_perjalanan
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status_hapus
 * @property string $slug
 *
 * @property Gunung $gunung
 * @property GunungJalurPos $manyGunungJalurPos
 * @property GunungKuota $manyGunungKuota
 * @property int $countGunungJalurPos
 */
class GunungJalur extends \yii\db\ActiveRecord
{
    use ListableTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gunung_jalur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gunung', 'nama'], 'required'],
            [['id_gunung'], 'integer'],
            [['jarak_puncak', 'jam_perjalanan'], 'number'],
            [['nama'], 'string', 'max' => 255],
            ['slug','safe'],

            [['created_at','updated_at','created_by','updated_by'],'integer'],
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
            'id_gunung' => Yii::t('app', 'Gunung'),
            'nama' => Yii::t('app', 'Nama Jalur'),
            'jarak_puncak' => Yii::t('app', 'Jarak Puncak'),
            'jam_perjalanan' => Yii::t('app', 'Jam Perjalanan'),
        ];
    }

    public static function find()
    {
        $query = parent::find();
        $query->andWhere('gunung_jalur.status_hapus IS NULL OR gunung_jalur.status_hapus = 0');

        return $query;
    }


    public function getGunung()
    {
        return $this->hasOne(Gunung::class,['id' => 'id_gunung']);
    }

    public function getManyGunungJalurPos()
    {
        return $this->hasMany(GunungJalurPos::class,['id_gunung_jalur' => 'id'])->orderBy(['urutan' => SORT_ASC]);
    }

    public function getCountGunungJalurPos()
    {
        return count($this->manyGunungJalurPos);
    }

    public function getManyGunungKuota()
    {
        return $this->hasMany(GunungKuota::class,['id_gunung_jalur' => 'id']);
    }
}
