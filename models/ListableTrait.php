<?php
/**
 * Created by PhpStorm.
 * User: Fauzan
 * Date: 10/07/2019
 * Time: 22.09
 */
namespace app\models;


use yii\helpers\ArrayHelper;

trait ListableTrait
{
    public static function getList()
    {
        return ArrayHelper::map(static::find()->all(),'id','nama');
    }

    public static function getListPendakiJenisKelamin()
    {
        return [
            static::PRIA => 'Laki - Laki',
            static::WANITA => 'Perempuan'
        ];
    }

    public static function getListStatusGunungAktif()
    {
        return [
            static::GUNUNG_AKTIF => 'Aktif',
            static::GUNUNG_NON_AKTIF => 'Tidak Aktif'
        ];
    }

    public static function getListStatusGunung()
    {
        return [
            static::DIBUKA => 'Dibuka',
            static::DITUTUP => 'Ditutup'
        ];
    }
}
