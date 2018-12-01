<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cradit;

/**
 * CraditSearch represents the model behind the search form of `backend\models\Cradit`.
 */
class CraditSearch extends Cradit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembayaran', 'no_kartu', 'cvv', 'nominal', 'keterangan'], 'integer'],
            [['nama_pemilik', 'tanggal_valid'], 'safe'],
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
        $query = Cradit::find();

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
            'id_pembayaran' => $this->id_pembayaran,
            'no_kartu' => $this->no_kartu,
            'tanggal_valid' => $this->tanggal_valid,
            'cvv' => $this->cvv,
            'nominal' => $this->nominal,
            'keterangan' => $this->keterangan,
        ]);

        $query->andFilterWhere(['like', 'nama_pemilik', $this->nama_pemilik]);

        return $dataProvider;
    }
}
