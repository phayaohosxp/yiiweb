<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_device_type".
 *
 * @property integer $id
 * @property string $name
 */
class CDeviceType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_device_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ประเภท',
        ];
    }
}
