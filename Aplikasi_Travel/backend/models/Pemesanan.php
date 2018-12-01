<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pemesanan".
 *
 * @property integer $id_pemesan
 * @property string $nama_pemesan
 * @property string $alamat_pemesan
 * @property string $email_pemasan
 * @property integer $notel
 * @property string $status
 * @property integer $paket_id
 * @property string $tanngal
 *
 * @property Cradit[] $cradits
 * @property Paket $paket
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemesan', 'nama_pemesan', 'alamat_pemesan', 'email_pemasan', 'notel', 'paket_id', 'tanngal'], 'required'],
            [['id_pemesan', 'notel', 'paket_id'], 'integer'],
            [['tanngal'], 'safe'],
            [['nama_pemesan'], 'string', 'max' => 255],
            [['alamat_pemesan', 'email_pemasan'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 100],
            ['email_pemasan', 'email', 'message' => 'Format Email Salah!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pemesan' => 'Id Pemesan',
            'nama_pemesan' => 'Nama Pemesan',
            'alamat_pemesan' => 'Alamat Pemesan',
            'email_pemasan' => 'Email Pemasan',
            'notel' => 'Notel',
            'status' => 'Status',
            'paket_id' => 'Paket ID',
            'tanngal' => 'Tanngal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradit()
    {
        return $this->hasMany(Cradit::className(), ['keterangan' => 'id_pemesan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaket()
    {
        return $this->hasOne(Paket::className(), ['id_paket' => 'paket_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportasi()
    {
        return $this->hasOne(Paket::className(), ['id_paket' => 'transportasi']);
    }
}
