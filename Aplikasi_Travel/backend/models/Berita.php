<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $id_berita
 * @property string $foto_berita
 * @property string $berita
 * @property string $tgl_berita
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foto_berita', 'berita', 'tgl_berita'], 'required'],
            //[['foto_berita', 'berita'], 'string'],
            [['lat','lng'], 'required'],
            [['tgl_berita','id_kecamatan'], 'safe'],
            ['foto_berita', 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 512000, 'tooBig' => 'batas 500KB'],
        ];
    }


    function Getruncatedberita()
    {
        if (strlen($this->berita)<=100)
            return $this->berita;
        else
            return substr($this ->berita, 0, 100). '...';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'foto_berita' => 'Foto Berita',
            'berita' => 'Berita',
            'tgl_berita' => 'Tgl Berita',
            'lat' => 'Lat',
            'lng' => 'Long',
            'id_kecamatan' => 'Id Kecamatan'
        ];
    }
}
