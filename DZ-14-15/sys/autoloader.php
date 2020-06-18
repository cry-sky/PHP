<?php
function autoloader($class)
{
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $file = "classes/{$class}.php";
    if(file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('autoloader');