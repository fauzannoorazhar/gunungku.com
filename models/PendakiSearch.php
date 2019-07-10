<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendaki;

/**
 * PendakiSearch represents the model behind the search form of `app\models\Pendaki`.
 */
class PendakiSearch extends Pendaki
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nik', 'jenis_kelamin', 'nomor_telpon', 'nomor_kerabat', 'id_provinsi', 'id_kabupaten'], 'integer'],
            [['nama', 'tanggal_lahir', 'email', 'alamat', 'file_pengenal'], 'safe'],
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
        $query = Pendaki::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nik' => $this->nik,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nomor_telpon' => $this->nomor_telpon,
            'nomor_kerabat' => $this->nomor_kerabat,
            'id_provinsi' => $this->id_provinsi,
            'id_kabupaten' => $this->id_kabupaten,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'file_pengenal', $this->file_pengenal]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }


}
