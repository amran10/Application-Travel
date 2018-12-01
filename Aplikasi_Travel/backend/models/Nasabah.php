<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nasabah".
 *
 * @property integer $no_rekening
 * @property integer $no_kartu
 * @property string $tanggal_valid
 * @property string $nama
 * @property integer $cvv
 * @property integer $saldo
 * @property string $status_kartu
 * @property integer $bank_id
 *
 * @property Cradit[] $cradits
 * @property Cradit[] $cradits0
 * @property Cradit[] $cradits1
 * @property Cradit[] $cradits2
 * @property Bank $bank
 * @property Transfer[] $transfers
 * @property Transfer[] $transfers0
 */
class Nasabah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nasabah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_rekening', 'no_kartu', 'tanggal_valid', 'nama', 'cvv', 'saldo', 'bank_id'], 'required'],
            [['no_rekening', 'no_kartu', 'cvv', 'saldo', 'bank_id'], 'integer'],
            [['tanggal_valid'], 'safe'],
            [['nama'], 'string', 'max' => 500],
            [['status_kartu'], 'string', 'max' => 20],
            [['no_kartu'], 'unique'],
            [['tanggal_valid'], 'unique'],
            [['cvv'], 'unique'],
            [['nama'], 'unique'],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id_bank']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_rekening' => 'No Rekening',
            'no_kartu' => 'No Kartu',
            'tanggal_valid' => 'Tanggal Valid',
            'nama' => 'Nama',
            'cvv' => 'Cvv',
            'saldo' => 'Saldo',
            'status_kartu' => 'Status Kartu',
            'bank_id' => 'Bank ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits()
    {
        return $this->hasMany(Cradit::className(), ['no_kartu' => 'no_kartu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits0()
    {
        return $this->hasMany(Cradit::className(), ['nama_pemilik' => 'nama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits1()
    {
        return $this->hasMany(Cradit::className(), ['cvv' => 'cvv']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits2()
    {
        return $this->hasMany(Cradit::className(), ['tanggal_valid' => 'tanggal_valid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id_bank' => 'bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['no_rekening' => 'no_rekening']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers0()
    {
        return $this->hasMany(Transfer::className(), ['no_rekening_tujuan' => 'no_rekening']);
    }
}
