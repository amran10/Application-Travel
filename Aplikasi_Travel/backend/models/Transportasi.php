<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transportasi".
 *
 * @property integer $id_transportasi
 * @property string $nama_transportasi
 *
 * @property Paket[] $pakets
 */
class Transportasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transportasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_transportasi'], 'required'],
            [['nama_transportasi'], 'string', 'max' => 900],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transportasi' => 'Id Transportasi',
            'nama_transportasi' => 'Nama Transportasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaket()
    {
        return $this->hasMany(Paket::className(), ['transportasi' => 'id_transportasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::className(), ['transportasi' => 'id_transportasi']);
    }
}
