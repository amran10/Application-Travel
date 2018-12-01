<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Transportasi;

/**
 * TransportasiSearch represents the model behind the search form of `backend\models\Transportasi`.
 */
class TransportasiSearch extends Transportasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transportasi'], 'integer'],
            [['nama_transportasi'], 'safe'],
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
    public function search($params)
    {
        $query = Transportasi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_transportasi' => $this->id_transportasi,
        ]);

        $query->andFilterWhere(['like', 'nama_transportasi', $this->nama_transportasi]);

        return $dataProvider;
    }
}
