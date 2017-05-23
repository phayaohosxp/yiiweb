<?php

namespace frontend\modules\orm\models;

use Yii;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "data".
 *
 * @property integer $id
 * @property string $val
 * @property string $owner
 * @property string $d_update 
 */
class Data extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $verifyCode;
    public $dataFile;

    public static function tableName() {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['val'], 'required'],
            [['val'], 'unique'],
            [['val', 'owner', 'd_update'], 'string', 'max' => 255],
            [
                'verifyCode', 'captcha',
                'captchaAction' => '/orm/default/captcha',
                'when' => function ($this) {
                    return $this->isNewRecord;
                }
            ],
            [ ['dataFile'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'val' => 'ข้อมูล',
            'owner' => 'เจ้าของ',
            'd_update' => 'ล่าสุด',
            'verifyCode' => 'รหัสป้องกัน',
        ];
    }

    public function behaviors() {
        /* $behav[] = [
          'class' => BlameableBehavior::className(),
          'createdByAttribute' => 'owner',
          'updatedByAttribute' => 'owner',
          ]; */
        $behav[] = [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'd_update',
            'updatedAtAttribute' => 'd_update',
            'value' => new Expression('NOW()'),
        ];
        return $behav;
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }

    public function upload() {
        $this->dataFile = UploadedFile::getInstance($this, 'dataFile');
        if ($this->dataFile) {
            $this->dataFile->saveAs('uploads/img_' . $this->id . '.' . $this->dataFile->extension);
        }
    }

}
