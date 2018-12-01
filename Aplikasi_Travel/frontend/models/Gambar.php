<?php

namespace frontend\models;

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
            [['foto', 'keterangan'], 'required'],
            [['foto'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 500],
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
            'keterangan' => 'Keterangan',
        ];
    }
}
