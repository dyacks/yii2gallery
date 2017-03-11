<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $description
 */
class Album extends ActiveRecord {

    /**
     * @var UploadedFile
     */
    public $images;
   // public $gallery;

    /**
     * @inheritdoc
     */
    public static function tableName(){
        return 'album';
    }
/*
    public function getImages()
    {
        return $this->hasMany(Images::className, ['album_id' => 'id']);
    }
*/
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['name'], 'required'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
           // [['images'], 'file', 'extensions' => 'png, jpg'],
            //[['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 30],
            //[['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'date' => 'Дата добавления/изменения',
            'description' => 'Описание',
            'images' => 'Картинка',
        ];
    }

    /**
     * @return bool
     */
    public function upload(){
        if ($this->validate()) {
            //$path = __DIR__.'/../../uploads/store/' . $this->images->baseName . '.' . $this->images->extension;
            //$this->images->saveAs($path);
            foreach ($this->images as $img) {
                $path = __DIR__.'/../../uploads/store/' . $img->baseName . '.' . $img->extension;
               // $path = __DIR__.'/../../uploads/store/' . $this->images->baseName . '.' . $this->images->extension;
                // this is call method Resizes
                $img->saveAs($path);
                $this->attachImage($path);
                unlink($path); // @ add to production
            }
            return true;
        } else {
            return false;
        }
    }


}