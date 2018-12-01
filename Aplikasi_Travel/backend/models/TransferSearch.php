<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Transfer;

/**
 * TransferSearch represents the model behind the search form of `backend\models\Transfer`.
 */
class TransferSearch extends Transfer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pembayaran', 'no_rekening', 'no_rekening_tujuan', 'nominal', 'keterangan'], 'integer'],
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
        $query = Transfer::find();

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
            'no_rekening' => $this->no_rekening,
            'no_rekening_tujuan' => $this->no_rekening_tujuan,
            'nominal' => $this->nominal,
            'keterangan' => $this->keterangan,
        ]);

        return $dataProvider;
    }
}
