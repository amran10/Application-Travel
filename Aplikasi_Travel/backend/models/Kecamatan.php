<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property integer $id_kecamatan
 * @property string $kecamatan
 * @property string $keterangan
 * @property string $foto
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kecamatan', 'keterangan', 'foto'], 'required'],
           // [['keterangan', 'foto'], 'string'],
            [['lat','lng'], 'required'],
            [['kecamatan'], 'string', 'max' => 100],
            ['foto', 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 512000, 'tooBig' => 'batas 500KB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kecamatan' => 'Id Kecamatan',
            'kecamatan' => 'Kecamatan',
            'keterangan' => 'Keterangan',
            'foto' => 'Foto',
            'lat'=> 'Lat',
            'lng' => 'Long',
        ];
    }
}
