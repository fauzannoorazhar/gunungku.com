<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaki_gunung".
 *
 * @property int $id
 * @property int $id_pendaki
 * @property int $id_gunung_jalur_masuk
 * @property int $id_gunung_jalur_keluar
 * @property string $tanggal_masuk
 * @property string $tanggal_keluar
 * @property int $created_at
 * @property int $updated_at
 *
 *
 * @property Pendaki $pendaki
 * @property GunungJalur $gunungJalurMasuk
 * @property GunungJalur $gunungJalurKeluar
 */
class PendakiGunung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaki_gunung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaki', 'id_gunung_jalur_masuk', 'id_gunung_jalur_keluar', 'created_at', 'updated_at'], 'required'],
            [['id_pendaki', 'id_gunung_jalur_masuk', 'id_gunung_jalur_keluar', 'created_at', 'updated_at'], 'integer'],
            [['tanggal_masuk', 'tanggal_keluar'], 'safe'],
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
            'id_gunung_jalur_masuk' => Yii::t('app', 'Id Gunung Jalur Masuk'),
            'id_gunung_jalur_keluar' => Yii::t('app', 'Id Gunung Jalur Keluar'),
            'tanggal_masuk' => Yii::t('app', 'Tanggal Masuk'),
            'tanggal_keluar' => Yii::t('app', 'Tanggal Keluar'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getPendaki()
    {
        return $this->hasOne(Pendaki::class,['id' => 'id_pendaki']);
    }

    public function getGunungJalurMasuk()
    {
        return $this->hasOne(GunungJalur::class,['id' => 'id_gunung_jalur_masuk']);
    }

    public function getGunungJalurKeluar()
    {
        return $this->hasOne(GunungJalur::class,['id' => 'id_gunung_jalur_keluar']);
    }

}
