<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PendakiGunung;

/**
 * PendakiGunungSearch represents the model behind the search form of `app\models\PendakiGunung`.
 */
class PendakiGunungSearch extends PendakiGunung
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pendaki', 'id_gunung_jalur_masuk', 'id_gunung_jalur_keluar', 'created_at', 'updated_at'], 'integer'],
            [['tanggal_masuk', 'tanggal_keluar'], 'safe'],
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
        $query = PendakiGunung::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_pendaki' => $this->id_pendaki,
            'id_gunung_jalur_masuk' => $this->id_gunung_jalur_masuk,
            'id_gunung_jalur_keluar' => $this->id_gunung_jalur_keluar,
            'tanggal_masuk' => $this->tanggal_masuk,
            'tanggal_keluar' => $this->tanggal_keluar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

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
