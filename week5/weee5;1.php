
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

<form action="weee5;1.php" method="POST" enctype="multipart/form-data">

    <label>Select image:</label>
    <input type="file" name="image">

    <br><br>

    <label>Rename file:</label>
    <input type="text" name="newName" placeholder="Enter new name">

    <br><br>

    <input type="submit" name="submit" value="Upload">

</form>

<?php

if (isset($_POST['submit'])) {

    if (!empty($_FILES['image']['name'])) {

        // File information
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $temp = $_FILES['image']['tmp_name'];

        echo "Original File Name: " . $fileName . "<hr>";

        echo "File Size: " . $fileSize . " bytes<hr>";

        echo "File Temporary Location: "
            . $temp . "<hr>";

        echo "File Type: " . $fileType . "<hr>";


        // Maximum file size = 10KB
        $maxSize = 10 * 1024;

        if ($fileSize > $maxSize) {

            echo "File is too large. Maximum size is 10KB.";

        } else {

            // Check if user entered a new name
            if (!empty($_POST['newName'])) {

                $newName = $_POST['newName'];

                // Get original extension
                $extension = pathinfo(
                    $fileName,
                    PATHINFO_EXTENSION
                );

                // Add original extension
                $newFileName = $newName . "." . $extension;

            } else {

                echo "Please enter a new file name.";

                exit;
            }


            echo "New File Name: "
                . $newFileName . "<hr>";


            // Destination
            $destination =
                "C:/Users/ktc/Desktop/PHP/Image/"
                . $newFileName;


            // Move file
            if (move_uploaded_file($temp, $destination)) {

                echo "Successful upload";

            } else {

                echo "Upload failed";

            }
        }

    } else {

        echo "Please select a file.";

    }
}

?>

</body>
</html>
