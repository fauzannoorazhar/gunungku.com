<?php

namespace app\modules\api\models;

class Gunung extends \app\models\Gunung
{
	public function fields()
    {
        $fields = parent::fields() ?? [];
        $fields['id'] = function () {
            return $this->id;
        };

        $fields['jenis_gunung'] = function () {
            return @$this->jenisGunung->nama;
        };

        $fields['status_aktif'] = function () {
            return $this->statusGunung;
        };

        $fields['kuota'] = function () {
            return $this->getCountKuotaJalur(date('Y-m-d'));
        };

        $fields['path_gambar'] = function () {
            return $this->getLinkDirektoriGambar();
        };

        return $fields;
    }
}
