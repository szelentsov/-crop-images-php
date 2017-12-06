<?php

/**
 * Класс загрузки изображений
 * Class ImageUpload
 */

class ImageUpload {

    private $maxFileSize;
    private $uploadDir;
    private $nameFile;

    public function __construct( $nameFile,$uploadDir, $maxFileSize) {
        $this->nameFile = $nameFile;
        $this->uploadDir = $uploadDir;
        $this->maxFileSize = $maxFileSize;
    }

//        Значение 1 соответствует картинке в формате GIF;
//        Значение 2 соответствует картинке в формате JPEG;
//        Значение 3 соответствует картинке в формате PNG;
//        Значение 4 соответствует картинке в формате SWF;
//        Значение 5 соответствует картинке в формате PSD;
//        Значение 6 соответствует картинке в формате BMP;
//        Значение 7 соответствует картинке в формате TIFF (байтовый порядок Intel);
//        Значение 8 соответствует картинке в формате TIPP (байтовый порядок Motorola);
//        Значение 9 соответствует картинке в формате JPC;
//        Значение 10 соответствует картинке в формате JP2;
//        Значение 11 соответствует картинке в формате JPX.

    public function is_image() {
        $is = getimagesize($_FILES[$this->nameFile]["tmp_name"]);
        if( !in_array($is[2], array(1,2,3,4,5,6,7,8,9,10,11)) ){
            return false;
        }else{
            return true;
        }
    }
    public function file_size() {
        $size = filesize($_FILES[$this->nameFile]["tmp_name"])/1024/1024;
        if($size>300){
            return false;
        }else{
            return true;
        }
    }

    public function upload(){
        if($this->is_image() && $this->file_size()){
            move_uploaded_file ( $_FILES[$this->nameFile]["tmp_name"], $this->uploadDir.$_FILES[$this->nameFile]["name"] );            
            echo $_FILES[$this->nameFile]["name"];            
        }else{
            if(!$this->is_image()){
                echo 'Файл не картинка';
            }elseif (!file_size()) {
                echo 'Файл не более 300 Мб';
            }
        }
        
    }


}