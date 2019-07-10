<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gunung_kuota".
 *
 * @property int $id
 * @property int $id_gunung
 * @property int $kuota
 * @property string $tanggal
 */
class GunungKuota extends \yii\db\ActiveRecord
{
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
            [['id_gunung', 'kuota'], 'required'],
            [['id_gunung', 'kuota'], 'integer'],
            [['tanggal'], 'safe'],
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
            'kuota' => Yii::t('app', 'Kuota'),
            'tanggal' => Yii::t('app', 'Tanggal'),
        ];
    }
}
