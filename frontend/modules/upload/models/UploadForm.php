<?php 
namespace frontend\modules\upload\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $dataFile;

    public function rules()
    {
        return [
            [['dataFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,pdf,doc'],
        ];
    }
    
    public function upload()
    {
        if ($this->dataFile->saveAs('uploads/' . $this->dataFile->baseName . '.' . $this->dataFile->extension)) {            
            return true;
        } else {
            return false;
        }
    }
}