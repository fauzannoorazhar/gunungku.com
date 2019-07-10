<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GunungJalur;

/**
 * GunungJalurSearch represents the model behind the search form of `app\models\GunungJalur`.
 */
class GunungJalurSearch extends GunungJalur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_gunung'], 'integer'],
            [['nama'], 'safe'],
            [['jarak_puncak', 'jam_perjalanan'], 'number'],
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
        $query = GunungJalur::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_gunung' => $this->id_gunung,
            'jarak_puncak' => $this->jarak_puncak,
            'jam_perjalanan' => $this->jam_perjalanan,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

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
