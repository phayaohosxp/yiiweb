<?php

namespace frontend\models;
use frontend\models\CDeviceType;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $id
 * @property string $date_add
 * @property string $device_type
 * @property string $device_sn
 * @property string $customer
 * @property string $date_recept
 * @property string $job_rapid
 * @property string $job_status
 * @property string $date_end
 * @property string $job_note
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer','device_type'],'required','message' => ''],
            [['date_add', 'date_recept', 'date_end'], 'safe'],
            [['job_note'], 'string'],
            [['device_type', 'device_sn', 'customer', 'job_rapid', 'job_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_add' => 'วันที่แจ้ง',
            'device_type' => 'ประเภท',
            'device_sn' => 'เลขครุภัณฑ์',
            'customer' => 'ผู้แจ้ง',
            'date_recept' => 'วันรับงาน',
            'job_rapid' => 'ความเร่งด่วน',
            'job_status' => 'สถานะ',
            'date_end' => 'วันสิ้นสุด',
            'job_note' => 'หมายเหตุ',
        ];
    }
    
    public function getDevicetype(){
        return $this->hasOne(CDeviceType::className(), ['id'=>'device_type']);
    }
}
