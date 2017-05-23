<?php

namespace frontend\modules\visit\models;

use Yii;

/**
 * This is the model class for table "c_discharge".
 *
 * @property string $dischargecode
 * @property string $dischargedesc
 */
class CDischarge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_discharge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dischargecode', 'dischargedesc'], 'required'],
            [['dischargecode'], 'string', 'max' => 1],
            [['dischargedesc'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dischargecode' => 'Dischargecode',
            'dischargedesc' => 'Dischargedesc',
        ];
    }
}
