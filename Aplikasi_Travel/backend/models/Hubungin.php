<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hubungin".
 *
 * @property integer $id_hubungi
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $keterangan
 */
class Hubungin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hubungin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'email', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['nama'], 'string', 'max' => 90],
            [['alamat'], 'string', 'max' => 2000],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hubungi' => 'Id Hubungi',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'keterangan' => 'Keterangan',
        ];
    }
}
