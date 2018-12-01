<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lokasi_terdekat".
 *
 * @property integer $id_lokasi
 * @property string $nama_lokasi
 * @property integer $id_kecamatan
 * @property string $lat
 * @property string $lng
 */
class LokasiTerdekat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lokasi_terdekat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lokasi', 'id_kecamatan'], 'required'],
            [['id_kecamatan'], 'integer'],
            [['nama_lokasi'], 'string', 'max' => 200],
            [['lat', 'lng'], 'string', 'max' => 255],
            [['id_kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['id_kecamatan' => 'id_kecamatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lokasi' => 'Id Lokasi',
            'nama_lokasi' => 'Nama Lokasi',
            'id_kecamatan' => 'Id Kecamatan',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }
}
