<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "paket".
 *
 * @property integer $id_paket
 * @property string $jenis_paket
 * @property integer $harga
 * @property integer $transportasi
 * @property string $deskripsi
 *
 * @property Transportasi $transportasi0
 * @property Pemesanan[] $pemesanans
 */
class Paket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_paket', 'harga', 'transportasi', 'deskripsi'], 'required'],
            [['harga', 'transportasi'], 'integer'],
            [['deskripsi'], 'string'],
            [['jenis_paket'], 'string', 'max' => 800],
            [['transportasi'], 'exist', 'skipOnError' => true, 'targetClass' => Transportasi::className(), 'targetAttribute' => ['transportasi' => 'id_transportasi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_paket' => 'Id Paket',
            'jenis_paket' => 'Jenis Paket',
            'harga' => 'Harga',
            'transportasi' => 'Transportasi',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportasis()
    {
        return $this->hasOne(Transportasi::className(), ['id_transportasi' => 'transportasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::className(), ['paket_id' => 'id_paket']);
    }
}
