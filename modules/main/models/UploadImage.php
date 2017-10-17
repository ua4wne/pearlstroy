<?php
namespace app\modules\main\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model{

    public $image;

    public function rules(){
        return[
            [['image'], 'required', 'message' => 'Не выбран файл!'],
            [['image'], 'file', 'extensions' => 'png, jpg', 'maxSize' => 1048576], //не более 1Мб!!!
        ];
    }

    public function upload(){
        if($this->validate()){
            $this->image->saveAs("images/{$this->image->baseName}.{$this->image->extension}");
        }
        else{
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Файл изображения'
        ];
    }
}