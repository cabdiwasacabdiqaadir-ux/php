<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>

<?php

if (!empty($_POST["name"])) {

    echo "FullName: " . $_POST["name"] . "<br>";
    echo "Password: " . $_POST["password"] . "<br>";
    echo "Comments: " . $_POST["comments"] . "<br>";
    echo "Gender: " . $_POST["Gender"] . "<br>";

    if (!empty($_POST["agree"])) {
        foreach ($_POST["agree"] as $value) {
            echo "Checkbox: " . $value . "<br>";
        }
        echo "Checkbox: Yes";
    }
}


?>

<br>

<form method="POST" style="width: 280px; border: 1px solid black; padding: 15px;">

    <label>Enter your name</label><br>
    <input type="text" name="name" style="width: 200px ; height: 25px;"><br><br>

    <label>Enter your password</label><br>
    <input type="password" name="password" style="width: 200px; height: 25px;"><br><br>

    <label>Enter your comments</label><br>
    <textarea name="comments" cols="30" rows="5"></textarea><br><br>

    <label>Please choose your gender</label><br><br>

    <input type="radio" name="Gender" value="male"> Male
    <input type="radio" name="Gender" value="female"> Female

    <br><br>


    <label>Please select</label><br><br>

    <input type="checkbox" name="agree" value="yes">
     computer

    <input type="checkbox" name="agree" value="yes">
     medicen

     <input type="checkbox" name="agree" value="no">
     Engnering

    <br><br>

    <button type="submit">Register</button>
    <button type="reset">Reset</button>

</form> <br>


<select name="pop" id="degmoyin">
    <option value="hodan">hodan</option>
     <option value="karaan">karaan</option>
      <option value="yaqshiid">yaqshiid</option>
</select>

<?php
phpinfo();

?>

</body>
</html>   