<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cradit".
 *
 * @property integer $id_pembayaran
 * @property integer $no_kartu
 * @property string $nama_pemilik
 * @property string $tanggal_valid
 * @property integer $cvv
 * @property integer $nominal
 * @property integer $keterangan
 *
 * @property Nasabah $noKartu
 * @property Nasabah $namaPemilik
 * @property Nasabah $cvv0
 * @property Nasabah $tanggalVal
 * @property Pemesanan $keterangan0
 */
class Cradit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cradit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_kartu', 'nama_pemilik', 'tanggal_valid', 'cvv', 'nominal', 'keterangan'], 'required'],
            [['cvv', 'nominal', 'keterangan'], 'integer'],
            [['tanggal_valid'], 'safe'],
            [['nama_pemilik'], 'string', 'max' => 500],
            [['no_kartu','nama_pemilik','tanggal_valid','cvv'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['no_kartu' => 'no_kartu','nama_pemilik' => 'nama','tanggal_valid' => 'tanggal_valid','cvv' => 'cvv']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'no_kartu' => 'No Kartu',
            'nama_pemilik' => 'Nama Pemilik',
            'tanggal_valid' => 'Tanggal Valid',
            'cvv' => 'Cvv',
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoKartu()
    {
        return $this->hasOne(Nasabah::className(), ['no_kartu' => 'no_kartu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaPemilik()
    {
        return $this->hasOne(Nasabah::className(), ['nama' => 'nama_pemilik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvv()
    {
        return $this->hasOne(Nasabah::className(), ['cvv' => 'cvv']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTanggalVal()
    {
        return $this->hasOne(Nasabah::className(), ['tanggal_valid' => 'tanggal_valid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeterangan0()
    {
        return $this->hasOne(Pemesanan::className(), ['id_pemesan' => 'keterangan']);
    }
}
