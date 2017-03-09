<?php

namespace backend\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Album extends ActiveRecord
{
    public $name;
    public $date;
    //public $count;
    public $description;

    /**
     * @var UploadedFile
     */
    public $imageFiles;


    public function rules(){
        return [
            //[['name', 'date', 'description'], 'required'],
            //['name', 'string', 'min' => 1, 'max' => 24],
            ['name', 'default', 'value' => 'default value'],
            ['date', 'date'],
            ['description', 'string', 'min' => 12, 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 30],
        ];
    }

    public function upload(){
        if ($this->validate()) {
            $request = \Yii::$app->request->post('Album');
            $this->name = $request['name'];
            $this->date = $request['date'];
            $this->description = $request['description'];
            foreach ($this->imageFiles as $file) {
                $file->saveAs(__DIR__.'/../../uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }


}