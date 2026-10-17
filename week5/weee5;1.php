<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    if(!empty($_FILES["image"]["name"])){
        echo "File name is". $_FILES["image"]["name"];
        echo "<hr>";
        echo "File size is". $_FILES["image"]["size"];
        "<hr>";
        echo "File type is". $_FILES["image"]["type"];

        "<hr>";

        $tmp = $_FILES["image"]["tmp_name"];
        $destination = "C:/Users/hp/Desktop/PHP/Image" . $_FILES["image"]["name"];

        if(move_uploaded_file($tmp,$destination)){
            echo "succesfull upload";
        }
        else {
            echo "field to upload";
        }

    }
    else{
        echo "please select file";
    }
    ?>

     <form action="java.php" method="POST" enctype="multiPart/form-data">
        <label for="">select gender</label> <br>
        <input type="file" name="image"> <br>
        <input type="submit" name="submit" value="upload"> uplod file
    </form>
</body>
</html>

