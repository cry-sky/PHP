<?php 


class Image {                                                       // Оголошення классу
    protected $handle;                                              // Оголошення параметру з обмеженям доступу(тільки для внутрішнього, і дочнього використання)            
    function ImageCreate($image)                                    // Оголошення методу з входящим параметром
    {
        if (is_string($image))                                      // Перевірка на строковий тип даних (TRUE,FALSE)
        {
            $info = pathinfo($image);                               // Оримання фізичного адреса вхідого файла
            $extension = strtolower($info['extension']);            // Повертае строку в нижньому реєстрі і ['extension'] повертає лигше формат файла
            switch ($extension)                                     // Фільтрація через switchcase
            {
                case 'jpg':
                case 'jpeg':
                    $this->handle = ImageCreateFromJPEG($image);    // Присвоеня параметру, для подальшого використання
                    echo 'ImageCreateFromJPEG';
                    break;
                case 'png':
                    $this->handle = ImageCreateFromPNG($image);     // Присвоеня параметру, для подальшого використання
                    echo 'ImageCreateFromPNG';
                    break;
                default:
                    die('Images must be JPEGs or PNGs.');           // Відключає подальші дії классу
            }
        }elseif (is_resource($image))                               // Перевірка чи є входящий параметр ресурсом (TRUE,FALSE)
        {
            $this->handle = $image;                                 // Присвоеня параметру
        }else 
        {
        die('Variables must be strings or resources.');             // Відключає подальші дії классу
        }
    }
}
$myimg = "";                                                       // Свій файл

echo "<h2>Полиморфизм методів</h2>"."<br>";

$classimg = new Image();                                           // Створення обєкту
$classimg -> ImageCreate($myimg);                                  // Використання методу з передачею параметра

/* Поліморфізм це можливість викорисання одного коду для різних типів даних,
   в даносу прикладі різних формарів файлів */

