<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property integer $id_bank
 * @property string $nama_bank
 *
 * @property Nasabah[] $nasabahs
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bank', 'nama_bank'], 'required'],
            [['id_bank'], 'integer'],
            [['nama_bank'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bank' => 'Id Bank',
            'nama_bank' => 'Nama Bank',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNasabahs()
    {
        return $this->hasMany(Nasabah::className(), ['bank_id' => 'id_bank']);
    }
}
