<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gunung_jalur".
 *
 * @property int $id
 * @property int $id_gunung
 * @property string $nama
 * @property string $jarak_puncak
 * @property string $jam_perjalanan
 */
class GunungJalur extends \yii\db\ActiveRecord
{
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_gunung' => Yii::t('app', 'Id Gunung'),
            'nama' => Yii::t('app', 'Nama'),
            'jarak_puncak' => Yii::t('app', 'Jarak Puncak'),
            'jam_perjalanan' => Yii::t('app', 'Jam Perjalanan'),
        ];
    }
}
