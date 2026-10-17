<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function sum($x,$y){
       global$z;
       $z=$x+$y;
        echo $z;
    }
    sum(10,20);
    echo 
    $x =10;
    $y=15;
    echo $z;
    sum($x,$y);
    
    ?>
</body>
</html>