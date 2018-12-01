<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property integer $id_pembayaran
 * @property integer $no_rekening
 * @property integer $no_rekening_tujuan
 * @property integer $nominal
 * @property integer $keterangan
 *
 * @property Nasabah $noRekening
 * @property Nasabah $noRekeningTujuan
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_rekening', 'no_rekening_tujuan', 'nominal', 'keterangan'], 'required'],
            [['no_rekening', 'no_rekening_tujuan', 'nominal', 'keterangan'], 'integer'],
            [['no_rekening'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['no_rekening' => 'no_rekening']],
            [['no_rekening_tujuan'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['no_rekening_tujuan' => 'no_rekening']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'no_rekening' => 'No Rekening',
            'no_rekening_tujuan' => 'No Rekening Tujuan',
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoRekening()
    {
        return $this->hasOne(Nasabah::className(), ['no_rekening' => 'no_rekening']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoRekeningTujuan()
    {
        return $this->hasOne(Nasabah::className(), ['no_rekening' => 'no_rekening_tujuan']);
    }
}
