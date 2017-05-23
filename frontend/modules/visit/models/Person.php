<?php

namespace frontend\modules\visit\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $prename
 * @property string $name
 * @property string $lname
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prename', 'name', 'lname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prename' => 'Prename',
            'name' => 'Name',
            'lname' => 'Lname',
        ];
    }
}
