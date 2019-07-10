<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GunungJalurPos;

/**
 * GunungJalurPosSearch represents the model behind the search form of `app\models\GunungJalurPos`.
 */
class GunungJalurPosSearch extends GunungJalurPos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_gunung_jalur', 'status_kemah', 'sumber_air'], 'integer'],
            [['nama'], 'safe'],
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
        $query = GunungJalurPos::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_gunung_jalur' => $this->id_gunung_jalur,
            'status_kemah' => $this->status_kemah,
            'sumber_air' => $this->sumber_air,
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
