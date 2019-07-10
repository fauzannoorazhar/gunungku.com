<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gunung;

/**
 * GunungSearch represents the model behind the search form of `app\models\Gunung`.
 */
class GunungSearch extends Gunung
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ketinggian', 'id_jenis_gunung', 'status_aktif', 'status', 'kuota'], 'integer'],
            [['nama', 'deskripsi', 'deskripsi_izin', 'deskripsi_wajib', 'deskripsi_dilarang', 'deskripsi_sanksi', 'deskripsi_kontak'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function getQuerySearch($params)
    {
        $query = Gunung::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ketinggian' => $this->ketinggian,
            'id_jenis_gunung' => $this->id_jenis_gunung,
            'status_aktif' => $this->status_aktif,
            'status' => $this->status,
            'kuota' => $this->kuota,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'deskripsi_izin', $this->deskripsi_izin])
            ->andFilterWhere(['like', 'deskripsi_wajib', $this->deskripsi_wajib])
            ->andFilterWhere(['like', 'deskripsi_dilarang', $this->deskripsi_dilarang])
            ->andFilterWhere(['like', 'deskripsi_sanksi', $this->deskripsi_sanksi])
            ->andFilterWhere(['like', 'deskripsi_kontak', $this->deskripsi_kontak]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['ketinggian' => SORT_DESC]]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }


}
