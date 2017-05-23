<?php

namespace frontend\modules\visit\models;

use Yii;

/**
 * This is the model class for table "tbvisit".
 *
 * @property integer $id
 * @property string $person_id
 * @property string $date_visit
 * @property string $time_visit
 * @property string $weight
 * @property string $height
 * @property integer $pulse
 * @property integer $sbp
 * @property integer $dbp
 * @property string $mental
 * @property string $note
 */
class Tbvisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbvisit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_visit', 'time_visit'], 'safe'],
            [['weight', 'height'], 'number'],
            [['pulse', 'sbp', 'dbp'], 'integer'],
            [['note'], 'string'],
            [['person_id', 'mental'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'date_visit' => 'Date Visit',
            'time_visit' => 'Time Visit',
            'weight' => 'Weight',
            'height' => 'Height',
            'pulse' => 'Pulse',
            'sbp' => 'Sbp',
            'dbp' => 'Dbp',
            'mental' => 'Mental',
            'note' => 'Note',
        ];
    }
}
