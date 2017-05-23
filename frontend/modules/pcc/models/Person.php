<?php

namespace frontend\modules\pcc\models;

use Yii;

class Person extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'person';
    }

    public function rules() {
        return [
            [['birth'], 'safe'],
            [['age'], 'integer'],
            [['prename', 'name', 'lname', 'addr', 'moo', 'prov_code', 'amp_code', 'tmb_code', 'lat', 'lon', 'rapid', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'สกุล',
            'birth' => 'วันเกิด',
            'age' => 'อายุ',
            'addr' => 'ที่อยู่',
            'moo' => 'หมู่',
            'prov_code' => 'จังหวัด',
            'amp_code' => 'อำเภอ',
            'tmb_code' => 'ตำบล',
            'lat' => 'Latitude',
            'lon' => 'Logitude',
            'rapid' => 'Rapid',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
