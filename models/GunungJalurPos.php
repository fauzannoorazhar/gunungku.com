<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "gunung_jalur_pos".
 *
 * @property int $id
 * @property int $id_gunung_jalur
 * @property string $nama
 * @property int $status_kemah
 * @property int $sumber_air
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status_hapus
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
            'id_gunung_jalur' => Yii::t('app', 'Id Gunung Jalur'),
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
}
