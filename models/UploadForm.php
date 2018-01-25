<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/7
 * Time: 11:50
 */

namespace app\models;

use yii\base\Model;

class UploadForm extends Model
{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 1, 'maxSize'=>1024*1024*5,
                'tooBig'=>'只能上传jpg,png,bmp格式,小于4M的图片',
                'wrongExtension'=>'只能上传jpg,png,gif格式,小于5M的图片',
            ],
        ];
    }

    public function uploadAvatar()
    {
        if ($this->validate()) {
            $newName = Image::generateName() . '.jpg';
            $filePath = Image::getUserFaceFullPath($newName, 'org');//原图路径
            //$filePath = Yii::$app->sftp->getSFtpPath($filePath);
            $dir = dirname($filePath);
            !is_dir($dir) && mkdir($dir, 0777, true);
            //Yii::$app->sftp->createDir($dir, 0777);
            $this->imageFile->saveAs($filePath);
            $width = $this->imageFile->size[0];
            $height = $this->imageFile->size[1];
            Image::createUserFaceImage($filePath,$newName,0,0,$width,$height);
            return ['basename' => $newName, 'error'=>0];
        } else {
            return ['error'=>1, 'message'=>$this->getFirstError('imageFile')];
        }
    }

    public function uploadAccount()
    {
        if ($this->validate()) {
            $newName = Image::generateName() . '.jpg';
            $filePath = Image::getAccountFullPath($newName, 'org');//原图路径
            $dir = dirname($filePath);
            !is_dir($dir) && mkdir($dir, 0777, true);
            $this->imageFile->saveAs($filePath);
            $width = $this->imageFile->size[0];
            $height = $this->imageFile->size[1];
            Image::createAccountImage($filePath,$newName,0,0,$width,$height);
            return ['basename' => $newName, 'error'=>0];
        } else {
            return ['error'=>1, 'message'=>$this->getFirstError('imageFile')];
        }
    }
}