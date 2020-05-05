<?php
include_once "config.php";
if(isset($_POST["submit"])){
    $uploadDir=$userDir;
    $size=$_POST['MAX_FILE_SIZE'];
    $typeFiles=array('image/jpeg','image/png','image/gif');

    for($i=0;$i<count($_FILES["uploaded"]["name"]);$i++){
        switch($_FILES['uploaded']['error'][$i]){
            case 1:
                echo $_FILES["uploaded"]["name"][$i] . " " . "Помилка: занадто великий файл обмеження PHP.ini" . "</br>";
                exit;
            break;
            case 2:
                echo $_FILES["uploaded"]["name"][$i] . " " . "Помилка: занадто великий файл" . "</br>";
                exit;
            break;
            case 3:
                echo $_FILES["uploaded"]["name"][$i] . " " . "Помилка: файл завантажений не повністю" . "</br>";
                exit;
            break;
            case 4:
                echo $_FILES["uploaded"]["name"][$i] . " " . "Помилка: файл не завантажений" . "</br>";
                exit;
            break;
            case 5:
                echo $_FILES["uploaded"]["name"][$i] . " " . "Помилка: відсутня дерикторія" . "</br>";
                exit;
            break;
        }
        
        if(!empty($_FILES["uploaded"]["name"])){  
            $sizebln='';
            $typebln='';
            if($_FILES["uploaded"]["size"][$i]<$size){
                $sizebln=1;
            }else{
                $sizebln=0;
                echo "файл занадто великий";
            }

            for($j=0;$j<count($typeFiles);$j++){
                if($_FILES["uploaded"]["type"][$i]==$typeFiles[$j]){
                    $typebln=1;
                    $type='';
                    
                    switch($_FILES["uploaded"]["type"][$i]){
                        case "image/jpeg":
                            $type='jpg';
                        break;
                        case "image/png":
                            $type='png';
                        break;
                        case "image/gif":
                            $type='gif';
                        break;
                    }
                    
                    if ($sizebln==1 && $typebln==1){
                        $filename=md5(uniqid($_FILES["uploaded"]["name"][$i])).'.'.$type;
                        $uploadFile=$uploadDir . basename($filename);
                        if (move_uploaded_file($_FILES['uploaded']['tmp_name'][$i], $uploadFile)) {
                        }     
                    }
                break;
                }else{
                    $typebln=0;
                }
                
            }
        }else{
            echo "файл не вибрано";    
        }
        if($typebln<1){
            echo $_FILES["uploaded"]["name"][$i] . " " . "Помилка: невірний формат файла" . "</br>"; 
        }
    }
}
?>