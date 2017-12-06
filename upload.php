<?php

/*
 * Загружаем классы
 */

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


/*
 * если существует в пост send то создаем экземпляр загрузчика и вызываем методы
 */

    $image_upload  = new ImageUpload('image','uploadfiles/',300000);
    $image_upload->upload();
