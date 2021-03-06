<?php

namespace frontend\modules\pcc\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Visit extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'visit';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['person_id', 'height', 'sbp', 'dbp'], 'integer'],
            [['date_visit'], 'safe'],
            [['weight'], 'number'],
            [['note', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'date_visit' => 'Date Visit',
            'weight' => 'Weight',
            'height' => 'Height',
            'sbp' => 'Sbp',
            'dbp' => 'Dbp',
            'note' => 'Note',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            ['class' => BlameableBehavior::className()]
        ];
    }

}
