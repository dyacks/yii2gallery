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
    public $image;
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
           // [['image'], 'file', 'extensions' => 'png, jpg'],
           // [['image'], 'file', 'extensions' => 'png, jpg'],
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
            'image' => 'Картинка',
        ];
    }

    /**
     * @return bool
     */
    public function upload(){
        if ($this->validate()) {
            //$path = __DIR__.'/../../uploads/store/' . $this->image->baseName . '.' . $this->image->extension;
            //$this->image->saveAs($path);

            foreach ($this->image as $img) {
                $path = __DIR__.'/../../uploads/store/' . $img->baseName . '.' . $img->extension;
               // $path = __DIR__.'/../../uploads/store/' . $this->image->baseName . '.' . $this->image->extension;
                // this is call method Resizes
                $img->saveAs($path);
               // $file->attachImage($path);
            }
           // $this->image->attachImage($path);


           // $this->save();
            return true;
        } else {
          //  var_dump($this->errors); die;
            return false;
        }
    }


}