<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gambar".
 *
 * @property integer $id_foto
 * @property string $foto
 * @property string $keterangan
 */
class Gambar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gambar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foto', 'keterangan', 'nama'], 'required'],
          //[['foto'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 500],
             [['id_kecamatan'], 'safe'],
             [['lat','lng'], 'required'],
            ['foto', 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 512000, 'tooBig' => 'batas 500KB'],
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_foto' => 'Id Foto',
            'foto' => 'Foto',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'id_kecamatan'=> 'Id Kecamatan',
            'lat' => 'Lat',
            'lng' => 'Long',
        ];
    }
}
