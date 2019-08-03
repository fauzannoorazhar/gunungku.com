<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\position\PositionBehavior;

/**
 * This is the model class for table "gunung_jalur_pos".
 *
 * @property int $id
 * @property int $id_gunung_jalur
 * @property string $nama
 * @property int $status_kemah
 * @property int $sumber_air
 * @property int $urutan
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $sumberAir
 * @property string $statusKemah
 * @property string $iconStatusKemah
 * @property string $iconSumberAir
 * @property GunungJalur $gunungJalur
 * @property int $status_hapus
 * @property string $slug
 */
class GunungJalurPos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gunung_jalur_pos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gunung_jalur', 'nama'], 'required'],
            [['id_gunung_jalur', 'status_kemah', 'sumber_air','urutan'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            ['slug','safe'],

            [['created_at','updated_at','created_by','updated_by'],'integer'],
            [['status_hapus'],'default','value' => 0],
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
                'class' => PositionBehavior::className(),
                'positionAttribute' => 'urutan',
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
            'id_gunung_jalur' => Yii::t('app', 'Jalur'),
            'nama' => Yii::t('app', 'Nama'),
            'status_kemah' => Yii::t('app', 'Status Kemah'),
            'sumber_air' => Yii::t('app', 'Sumber Air'),
        ];
    }

    public static function find()
    {
        $query = parent::find();
        $query->andWhere('status_hapus IS NULL OR status_hapus = 0');

        return $query;
    }

    public function getGunungJalur()
    {
        return $this->hasOne(GunungJalur::class,['id' => 'id_gunung_jalur']);
    }

    public function getStatusKemah()
    {
        if ($this->status_kemah) {
            return 'Bisa Berkemah';
        } else {
            return 'Tidak Bisa Berkemah';
        }
    }

    public function getSumberAir()
    {
        if ($this->sumber_air) {
            return 'Terdapat Sumber Air';
        } else {
            return 'Tidak Terdapat Sumber Air';
        }
    }

    public function getIconStatusKemah()
    {
        if ($this->status_kemah) {
            return '<span class="fa fa-check text-success" data-toggle="tooltip" title="'.$this->statusKemah.'"></span>';
        } else {
            return '<span class="fa fa-close text-danger" data-toggle="tooltip" title="'.$this->statusKemah.'"></span>';
        }
    }

    public function getIconSumberAir()
    {
        if ($this->sumber_air) {
            return '<span class="fa fa-check text-success" data-toggle="tooltip" title="'.$this->sumberAir.'"></span>';
        } else {
            return '<span class="fa fa-close text-danger" data-toggle="tooltip" title="'.$this->sumberAir.'"></span>';
        }
    }
}
