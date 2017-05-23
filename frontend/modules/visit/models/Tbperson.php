<?php

namespace frontend\modules\visit\models;

use Yii;
use frontend\modules\visit\models\CProvince;
use frontend\modules\visit\models\CAmpur;
use frontend\modules\visit\models\CTambon;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tbperson".
 *
 * @property integer $id
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $birth
 * @property string $sex
 * @property integer $age_y
 * @property string $addr
 * @property string $prov_code
 * @property string $amp_code
 * @property string $tmb_code
 * @property string $dischage_code
 * @property string $color
 * @property string $note
 * @property string $created_by
 * @property string $d_update
 */
class Tbperson extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $imgFile;

    public static function tableName() {
        return 'tbperson';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'lname'], 'required'],
            [['birth', 'created_by'], 'safe'],
            [['age_y'], 'integer'],
            [['note'], 'string'],
            [['prename', 'name', 'lname', 'sex', 'addr', 'prov_code', 'amp_code', 'tmb_code', 'dischage_code', 'color'], 'string', 'max' => 255],
            [ ['imgFile'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'prename' => 'คำนำ',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'birth' => 'วดป.เกิด',
            'sex' => 'เพศ',
            'age_y' => 'อายุ(ป)',
            'addr' => 'ที่อยู่',
            'prov_code' => 'จังหวัด',
            'amp_code' => 'อำเภอ',
            'tmb_code' => 'ตำบล',
            'dischage_code' => 'สถานะ',
            'color' => 'Color',
            'note' => 'Note',
        ];
    }

    public function behaviors() {
        return[
            ['class' => BlameableBehavior::className()],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'd_update',
                'updatedAtAttribute' => 'd_update',
                'value' => new Expression('NOW()')
            ]
        ];
    }

    // join
    public function getProv() {
        return $this->hasOne(CProvince::className(), ['changwatcode' => 'prov_code']);
    }

    public function getAmpur() {
        return $this->hasOne(CAmpur::className(), ['ampurcodefull' => 'amp_code']);
    }

    public function getTambon() {
        return $this->hasOne(CTambon::className(), ['tamboncodefull' => 'tmb_code']);
    }

    //end join
    
    public function upload(){
        $this->imgFile = UploadedFile::getInstance($this, 'imgFile');
        if ($this->imgFile) {
            $this->imgFile->saveAs('uploads/p' . $this->id . '.' . $this->imgFile->extension);
        }
    }
}
