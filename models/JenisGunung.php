<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_gunung".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 */
class JenisGunung extends \yii\db\ActiveRecord
{
    use ListableTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_gunung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nama','unique'],
            [['nama'], 'required'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 225],
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
        ];
    }
}
