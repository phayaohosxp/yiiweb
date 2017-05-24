<?php

namespace frontend\modules\pcc\models;

use Yii;

 
class TambonGis extends \yii\db\ActiveRecord
{
 
    public static function tableName()
    {
        return 'tambon_gis';
    }

 
    public function rules()
    {
        return [
            [['PROV_CODE', 'AMP_CODE', 'TAM_CODE'], 'required'],
            [['COORDINATES'], 'string'],
            [['PROV_CODE', 'AMP_CODE', 'TAM_CODE'], 'string', 'max' => 2],
            [['TAM_NAMT', 'TAM_NAME', 'GIS_TYPE', 'NOTE1', 'NOTE2', 'NOTE3', 'NOTE4', 'NOTE5'], 'string', 'max' => 255],
        ];
    }

 
    public function attributeLabels()
    {
        return [
            'PROV_CODE' => 'Prov  Code',
            'AMP_CODE' => 'Amp  Code',
            'TAM_CODE' => 'Tam  Code',
            'TAM_NAMT' => 'Tam  Namt',
            'TAM_NAME' => 'Tam  Name',
            'GIS_TYPE' => 'Gis  Type',
            'COORDINATES' => 'Coordinates',
            'NOTE1' => 'Note1',
            'NOTE2' => 'Note2',
            'NOTE3' => 'Note3',
            'NOTE4' => 'Note4',
            'NOTE5' => 'Note5',
        ];
    }
}
