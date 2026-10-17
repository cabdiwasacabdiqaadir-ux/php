<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post">
    <label for="">Enter Full Name</label> 
    <input type="text" name = "name" placeholder="Enter your name"> 
    <label for="">Enter Password</label> 
    <input type="password" name="password" placeholder="Enter your password">
    <label for="">Choose your gender</label> 
    <input class="male_radio" type="radio" name="sex" value="male"> Male
    <input class="female_radio" type="radio" name="sex" value="female"> Female
    <label for="">Choose your faculty</label> 
    <input class="eng" type="checkbox" name="faculties[]" value="engineering"> Engineering
     <input class="eng" type="checkbox" name="faculties[]" value="medicine"> medicine
     <input class="eng" type="checkbox" name="faculties[]" value="computer science"> computer science
    <label for="">Enter Your Message</label> 
    <textarea placeholder="Enter your message" cols="30" rows="6" name="message"></textarea>
    <div class="buttons">
        <button type="rest" class="rest_button" >Rest From</button>
        <button type="submit" class="register_button">Register</button>
    </div>
</form>

<?php

echo "Fullname is : ".$_POST["name"] ."<br>";

echo "password is : ".$_POST["password"] ."<br>";

echo "message is : ".$_POST["message"] ."<br>";

if(!Empty($_POST["sex"])){
    echo "gender is :".$_POST["sex"] ."<br>";
}
else {
    echo "gender are required" ."<br>";
}

if(!Empty($_POST['faculties'])){
    foreach($_POST['faculties'] as $faculty){
        echo "faculty is : $faculty"."<br>";
    }
}

// echo "faculties is".$_POST["faculties"] ."<br>";


?>
    
</body>
</html>