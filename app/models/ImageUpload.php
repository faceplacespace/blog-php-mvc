<?php

namespace app\models;

use components\exception\ImageUploadException;

class ImageUpload
{
    
    const UPLOAD_DIR = '../uploads/';
    const MAX_IMAGE_SIZE = 5000000;
    const ALLOWED_TYPES = [IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_WEBP];
    
    public $image = [];
    
    public function __construct(array $imageData)
    {
        $this->image = $imageData;
    }

    public function uploadImage($currentImage = null)
    {
        
        $this->validate();
        
        $fileName = $this->generateFileName();
        

        if (!$this->saveImage($fileName)) {
            throw new ImageUploadException('Failed to move uploaded file.');
        }
        
        if($currentImage !== null) {
            $this->removeImage($currentImage);
        }

        return self::UPLOAD_DIR . $fileName;
        
    }
    
    private function generateFileName() 
    {
        $extension = pathinfo($this->image['name'], PATHINFO_EXTENSION);
        return strtolower(md5($this->image['name'].time())) . '.' . $extension;
    }
    
    private function getFileType()
    {
        return exif_imagetype($this->image['tmp_name']);
    }
    
    private function validate()
    {
        
        if (!isset($this->image['error']) || is_array($this->image['error']['error'])) {
            throw new ImageUploadException('Invalid parameters.');
        }
        
        switch ($this->image['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new ImageUploadException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new ImageUploadException('Exceeded filesize limit.');
            default:
                throw new ImageUploadException('Unknown errors.');
        }
        
        if ($this->image['size'] > self::MAX_IMAGE_SIZE) {
            throw new ImageUploadException('Exceeded filesize limit.');
        }
        
        if (!in_array($this->getFileType(), self::ALLOWED_TYPES)) {
            throw new ImageUploadException('Invalid file format.');
        }
        
    }
    
    private function saveImage($fileName) 
    {
        return move_uploaded_file($this->image['tmp_name'], self::UPLOAD_DIR . $fileName);
    }
    
    public static function removeImage($fileName) 
    {

        if (file_exists($fileName)) {
            unlink($fileName);
            return true;
        }
        
        return false;
        
    }
    
}