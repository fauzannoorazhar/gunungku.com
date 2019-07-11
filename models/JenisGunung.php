<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "jenis_gunung".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status_hapus
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
            'nama' => Yii::t('app', 'Nama'),
            'deskripsi' => Yii::t('app', 'Deskripsi'),
        ];
    }

    public static function find()
    {
        $query = parent::find();
        $query->andWhere('status_hapus IS NULL OR status_hapus = 0');

        return $query;
    }
}
