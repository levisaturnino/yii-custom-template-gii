<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property int $id
 * @property string $nome
 * @property string $local
 * @property int $horario
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'local', 'horario'], 'required'],
            [['horario'], 'integer'],
            [['nome', 'local'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'local' => 'Local',
            'horario' => 'Horario',
        ];
    }
}
