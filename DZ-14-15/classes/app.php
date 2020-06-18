<?php

class App
{
    public static $files;
    public static $file;
    public static $db = [];
    
    public static function openfiles($dir)
    {
        if(App::$files = opendir($dir))
        {
            while(false !== (App::$file = readdir(App::$files))) 
            {
                if(App::$file != "." && App::$file != "..")
                { 
                    if(end(explode(".", App::$file)) === 'csv'){
                        echo "csv true";
                    }elseif(end(explode(".", App::$file)) === 'json'){
                        echo "json true";
                    }elseif(end(explode(".", App::$file)) === 'txt'){
                        echo "txt true";
                    }
                }
            }
        }
    }
}
