<?php

$data = $_POST;
$image = "uploadfiles/".$data['img'];
//$w_i ширена изображения
//$h_i высота изображения
//$x_o и $y_o - координаты левого верхнего угла выходного изображения на исходном
list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
$types = array("", "gif", "jpeg", "png", "swf", "psd", "bmp", "tiff", "tipp", "jpc", "jp2", "jpx"); // Массив с типами изображений
$ext = $types[$type];
      
$func = 'imagecreatefrom'.$ext;
$img_i = $func($image); // Создаём дескриптор для работы с исходным изображением

$w_section = $w_i/5;
$h_section;

function create_section($img_i,$w_section,$h_section,$func,$ext,$section_name,$x_o,$y_o) {
    $img_o = imagecreatetruecolor($w_section,$h_section );
    imagecopy($img_o, $img_i,0,0,$x_o,$y_o,$w_section,$h_section);
    $func = 'image'.$ext;
    $image = "uploadfiles/".$section_name;
    return $func($img_o, $image);
}
create_section($img_i,$w_i+40,$h_i,$func,$ext,'sectionall',$w_i,$h_i);
create_section($img_i,$w_section,$h_i*0.333333,$func,$ext,'section1',0,($h_i/2)-($h_i*0.333333)/2);
create_section($img_i,$w_section,$h_i*0.55,$func,$ext,'section2',$w_section,($h_i/2)-($h_i*0.55)/2);
create_section($img_i,$w_section,$h_i,$func,$ext,'section3',($w_i-3*$w_section),0);
create_section($img_i,$w_section,$h_i*0.55,$func,$ext,'section4',($w_i-2*$w_section),($h_i/2)-($h_i*0.55)/2);
create_section($img_i,$w_section,$h_i*0.333333,$func,$ext,'section5',($w_i-$w_section),($h_i/2)-($h_i*0.333333)/2);

$im = "uploadfiles/sectionall";
$img = imagecreatefromjpeg($im);

list($w_0, $h_0) = getimagesize($im);
imagefilter($img, IMG_FILTER_COLORIZE,255,255,255);

$im_1 = "uploadfiles/section1";
$img_1 = imagecreatefromjpeg($im_1);

list($w_1, $h_1) = getimagesize($im_1);
imagecopy($img, $img_1,0,($h_0/2)-($h_0*0.333333)/2,0,0,$w_1,$h_1);

$im_2 = "uploadfiles/section2";
$img_2 = imagecreatefromjpeg($im_2);

list($w_2, $h_2) = getimagesize($im_2);
imagecopy($img, $img_2,$w_0/5,($h_0/2)-($h_0*0.55)/2,0,0,$w_2,$h_2);

$im_3 = "uploadfiles/section3";
$img_3 = imagecreatefromjpeg($im_3);

list($w_3, $h_3) = getimagesize($im_3);
imagecopy($img, $img_3,$w_0-$w_0/5*3,0,0,0,$w_3,$h_3);

$im_4 = "uploadfiles/section4";
$img_4 = imagecreatefromjpeg($im_4);

list($w_4, $h_4) = getimagesize($im_4);
imagecopy($img, $img_4,($w_0-$w_0/5*2),($h_0/2)-($h_0*0.55)/2,0,0,$w_4,$h_4);

$im_5 = "uploadfiles/section5";
$img_5 = imagecreatefromjpeg($im_5);

list($w_5, $h_5) = getimagesize($im_5);
imagecopy($img, $img_5,($w_0-$w_0/5),($h_0/2)-($h_0*0.333333)/2,0,0,$w_5,$h_5);

imagejpeg($img, "uploadfiles/sectionall");

imagedestroy($img);
imagedestroy($img_1);
imagedestroy($img_2);
imagedestroy($img_3);
imagedestroy($img_4);
imagedestroy($img_5);
imagedestroy($img_i);

$img_pred= ("uploadfiles/sectionall");
$img_pred_finall = imagecreatefromjpeg($img_pred);
list($w_pred_finall, $h_pred_finall) = getimagesize($img_pred);
$img_finall = imagecreatetruecolor($w_pred_finall+40, $h_pred_finall+46);
imagefilter($img_finall, IMG_FILTER_COLORIZE,255,255,255);
imagecopy($img_finall, $img_pred_finall,20,23,0,0,$w_pred_finall,$h_pred_finall);

imagejpeg($img_finall, "uploadfiles/sectionfinall");

//apt-get install imagemagick-devel