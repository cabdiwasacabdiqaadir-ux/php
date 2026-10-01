<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

$about=array(

        array("wasac",2005,"hodan","061429456"),
        array("muuse",2001,"karaaan","061434563"),
        array("ali",1986,"kaxda","0614298553"),
       
        
    );
    echo "<br>";
    echo $about[0][0];
    foreach($about as $list){
        echo $list[0],$list[1];
    };
    echo "<table border=1> ";
    echo"<th>Name</th>";
    echo"<th>year of Birth</th>";
    echo"<th>Adress</th>";
    echo"<th>Phone</th>";
    foreach ($about as $list){
        echo "<tr>";
        foreach($list as $item){
            echo "<td>".$item."</td>";
        }
       echo "</tr>";
    }
    echo"</table>";

    if(is_array($about)){
        echo "this is an array";
        }else{
            echo "this is not an array";
        }
 
    ?>
    
</body>
</html>