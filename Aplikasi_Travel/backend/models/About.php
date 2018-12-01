<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $id_about
 * @property string $foto_about
 * @property string $tentang
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foto_about', 'tentang'], 'required'],
           // [['foto_about', 'tentang'], 'string'],
             ['foto_about', 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 512000, 'tooBig' => 'batas 500KB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_about' => 'Id About',
            'foto_about' => 'Foto About',
            'tentang' => 'Tentang',
        ];
    }
}
