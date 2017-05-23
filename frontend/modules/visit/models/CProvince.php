<?php

namespace frontend\modules\visit\models;

use Yii;

/**
 * This is the model class for table "c_province".
 *
 * @property string $changwatcode
 * @property string $changwatname
 * @property string $zonecode
 */
class CProvince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['changwatcode'], 'required'],
            [['changwatcode', 'zonecode'], 'string', 'max' => 2],
            [['changwatname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'changwatcode' => 'Changwatcode',
            'changwatname' => 'จังหวัด',
            'zonecode' => 'Zonecode',
        ];
    }
}
