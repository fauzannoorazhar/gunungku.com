<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gunung_jalur_pos".
 *
 * @property int $id
 * @property int $id_gunung_jalur
 * @property string $nama
 * @property int $status_kemah
 * @property int $sumber_air
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
            [['id_gunung_jalur', 'status_kemah', 'sumber_air'], 'integer'],
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
            'id_gunung_jalur' => Yii::t('app', 'Id Gunung Jalur'),
            'nama' => Yii::t('app', 'Nama'),
            'status_kemah' => Yii::t('app', 'Status Kemah'),
            'sumber_air' => Yii::t('app', 'Sumber Air'),
        ];
    }
}
