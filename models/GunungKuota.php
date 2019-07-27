<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "gunung_kuota".
 *
 * @property int $id
 * @property int $id_gunung_jalur
 * @property int $kuota
 * @property int $status
 * @property string $tanggal
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property GunungJalur $gunungJalur
 * @property int $status_hapus
 */
class GunungKuota extends \yii\db\ActiveRecord
{
    public $id_gunung;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gunung_kuota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gunung_jalur','tanggal'],'unique','targetAttribute' => ['id_gunung_jalur','tanggal']],
            [['id_gunung_jalur', 'kuota'], 'required'],
            [['id_gunung_jalur', 'kuota'], 'integer'],
            [['tanggal','id_gunung'], 'safe'],

            ['status','default','value' => 1],
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
            'kuota' => Yii::t('app', 'Kuota'),
            'tanggal' => Yii::t('app', 'Tanggal'),
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

    public static function findGunungKuotaByCondition($params=[])
    {
        $query = static::find()
            ->andFilterWhere(['id_gunung_jalur' => @$params['id_gunung_jalur']])
            ->andFilterWhere(['tanggal' => @$params['tanggal']])
            ->one();

        if ($query === null) {
            return null;
        }

        return $query;
    }
}
