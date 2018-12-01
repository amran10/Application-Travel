<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LokasiTerdekat;

/**
 * LokasiTerdekatSearch represents the model behind the search form of `backend\models\LokasiTerdekat`.
 */
class LokasiTerdekatSearch extends LokasiTerdekat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lokasi', 'id_kecamatan'], 'integer'],
            [['nama_lokasi', 'lat', 'lng'], 'safe'],
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
        $query = LokasiTerdekat::find();

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
            'id_lokasi' => $this->id_lokasi,
            'id_kecamatan' => $this->id_kecamatan,
        ]);

        $query->andFilterWhere(['like', 'nama_lokasi', $this->nama_lokasi])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng]);

        return $dataProvider;
    }
}
