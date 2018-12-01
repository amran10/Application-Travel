<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Nasabah;

/**
 * NasabahSearch represents the model behind the search form of `backend\models\Nasabah`.
 */
class NasabahSearch extends Nasabah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_rekening', 'no_kartu', 'cvv', 'saldo', 'bank_id'], 'integer'],
            [['tanggal_valid', 'nama', 'status_kartu'], 'safe'],
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
        $query = Nasabah::find();

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
            'no_rekening' => $this->no_rekening,
            'no_kartu' => $this->no_kartu,
            'tanggal_valid' => $this->tanggal_valid,
            'cvv' => $this->cvv,
            'saldo' => $this->saldo,
            'bank_id' => $this->bank_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'status_kartu', $this->status_kartu]);

        return $dataProvider;
    }
}
