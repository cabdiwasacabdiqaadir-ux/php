<?php

function calculateTotal($php, $database, $networking)
{
    $total = $php + $database + $networking;

    return $total;
}



function calculateAverage($php, $database, $networking)
{
    $total = calculateTotal($php, $database, $networking);

    $average = $total / 3;

    return $average;
}


// Function 3: Calculate Grade
function calculateGrade($average)
{
    if ($average >= 90) {

        return "A";

    } elseif ($average >= 80) {

        return "B";

    } elseif ($average >= 70) {

        return "C";

    } elseif ($average >= 60) {

        return "D";

    } else {

        return "F";
    }
}


// Function 4: Check Pass or Fail
function checkResult($average)
{
    if ($average >= 60) {

        return "Pass";

    } else {

        return "Fail";
    }
}




$student_name = "";
$student_id = "";
$gender = "";
$faculty = "";

$php_mark = "";
$database_mark = "";
$networking_mark = "";

$certificate_name = "";
$file_type = "";
$file_size = "";
$upload_status = "";

$errors = "";

$total_marks = 0;
$average_marks = 0;
$grade = "";
$result = "";

$show_result = false;




if ($_SERVER["REQUEST_METHOD"] == "POST") {


  

    if (isset($_POST["student_name"])) {

        $student_name = trim($_POST["student_name"]);

    }


 

    if (isset($_POST["student_id"])) {

        $student_id = trim($_POST["student_id"]);

    }



    if (isset($_POST["gender"])) {

        $gender = $_POST["gender"];

    }


  

    if (isset($_POST["faculty"])) {

        $faculty = $_POST["faculty"];

    }


    if (isset($_POST["php_mark"])) {

        $php_mark = $_POST["php_mark"];

    }



    if (isset($_POST["database_mark"])) {

        $database_mark = $_POST["database_mark"];

    }


  

    if (isset($_POST["networking_mark"])) {

        $networking_mark = $_POST["networking_mark"];

    }


 

    if (empty($student_name)) {

        $errors .= "Student name must not be empty.<br>";

    }


    if (empty($student_id)) {

        $errors .= "Student ID must not be empty.<br>";

    }


    

    if (empty($gender)) {

        $errors .= "Gender must be selected.<br>";

    }




    if (empty($faculty)) {

        $errors .= "Faculty must be selected.<br>";

    }


   

    if ($php_mark === "") {

        $errors .= "PHP mark must be entered.<br>";

    } elseif ($php_mark < 0 || $php_mark > 100) {

        $errors .= "PHP mark must be between 0 and 100.<br>";

    }


   

    if ($database_mark === "") {

        $errors .= "Database mark must be entered.<br>";

    } elseif ($database_mark < 0 || $database_mark > 100) {

        $errors .= "Database mark must be between 0 and 100.<br>";

    }


   

    if ($networking_mark === "") {

        $errors .= "Networking mark must be entered.<br>";

    } elseif ($networking_mark < 0 || $networking_mark > 100) {

        $errors .= "Networking mark must be between 0 and 100.<br>";

    }


   

    if (empty($errors)) {

        if (isset($_FILES["certificate"]) && $_FILES["certificate"]["error"] == 0) {

            $certificate_name = $_FILES["certificate"]["name"];

            $file_type = $_FILES["certificate"]["type"];

            $file_size = $_FILES["certificate"]["size"];

            $temporary_file = $_FILES["certificate"]["tmp_name"];

            $upload_folder = "uploads";



            if (!file_exists($upload_folder)) {
              
                 mkdir($upload_folder, 0777, true);

            }



            $destination = $upload_folder . $certificate_name;


        

            if ($file_size > 2 * 1024 * 1024) {

                $errors .= "Certificate file must not be larger than 2 MB.<br>";

            }


        

            elseif (file_exists($destination)) {

                $errors .= "A file with the same name already exists.<br>";

            }


         

            else {

                if (move_uploaded_file($temporary_file, $destination)) {

                    $upload_status = "Upload Successful";

                } else {

                    $errors .= "Certificate upload failed.";

                    $upload_status = "Upload Failed";

                }

            }


        } else {

            $errors .= "Please upload a student certificate.";

            $upload_status = "Upload Failed";

        }


    }


 

    if (empty($errors)) {


   

        $php_mark = (float) $php_mark;

        $database_mark = (float) $database_mark;

        $networking_mark = (float) $networking_mark;


       

        $total_marks = calculateTotal(
            $php_mark,
            $database_mark,
            $networking_mark
        );




        $average_marks = calculateAverage(
            $php_mark,
            $database_mark,
            $networking_mark
        );




        $grade = calculateGrade($average_marks);


    

        $result = checkResult($average_marks);



        $show_result = true;

    }

}

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Management System</title>
</head>
<body>
<div class="container">
    <h1>Student Grade Management System</h1>

    <p class="description">
        Enter student information and examination marks
    </p>

    <?php



    if (!empty($errors)) {

        ?>

        <div class="error-box">

            <h2>Validation Error</h2>

            <?php

            echo $errors;

            ?>

        </div>

        <?php

    }

    ?>
    <form action="" method="POST"enctype="multipart/form-data">

        <div class="form-group"><br>

            <label for="student_name">Student Name</label>

            <input type="text" id="student_name" name="student_name" placeholder="Enter student name" value="<?php echo htmlspecialchars($student_name); ?>">

        </div><br>

        <div class="form-group">

            <label for="student_id"> Student ID</label>

            <input type="text" id="student_id" name="student_id" placeholder="Enter student ID" value="<?php echo htmlspecialchars($student_id); ?>">

        </div> <br>

        <div class="form-group">
            <label>Gender</label>

            <div class="gender-group">
            <label class="gender-option">
            <input type="radio" name="gender" value="Male"
                        <?php
                         if ($gender == "Male") {
                            echo "checked"; }
                        ?>>
                    Male

                </label>

                <label class="gender-option">

                    <input type="radio" name="gender" value="Female"
                        <?php

                        if ($gender == "Female") {

                            echo "checked";

                        }

                        ?>
                    >

                    Female

                </label>

            </div>

        </div><br>


       

        <div class="form-group">

            <label for="faculty">
                Faculty
            </label>


            <select
                name="faculty"
                id="faculty"
            >

                <option value="">
                  
                </option>


                <option
                    value="Computer Science"
                    <?php

                    if ($faculty == "Computer Science") {

                        echo "selected";

                    }

                    ?>
                >
                    Computer Science
                </option>


                <option
                    value="Information Technology"
                    <?php

                    if ($faculty == "Information Technology") {

                        echo "selected";

                    }

                    ?>
                >
                    Information Technology
                </option>


                <option
                    value="Business Administration"
                    <?php

                    if ($faculty == "Business Administration") {

                        echo "selected";

                    }

                    ?>
                >
                    Business Administration
                </option>


                <option
                    value="Accounting"
                    <?php

                    if ($faculty == "Accounting") {

                        echo "selected";

                    }

                    ?>
                >
                    Accounting
                </option>


                <option
                    value="Engineering"
                    <?php

                    if ($faculty == "Engineering") {

                        echo "selected";

                    }

                    ?>
                >
                    Engineering
                </option>

            </select>

        </div> <br>


     

        <div class="form-group">

            <label for="php_mark">  PHP Mark</label>

            <input type="number" id="php_mark" name="php_mark" min="0" max="100" placeholder="Enter PHP mark" value="
            <?php echo ($php_mark); ?>" >

        </div><br>


       

        <div class="form-group">
            <label for="database_mark"> Database Mark </label>
            <input type="number" id="database_mark" name="database_mark" min="0" max="100" placeholder="Enter Database mark" value="
            <?php echo ($database_mark); ?>">
    </div><br>

    <div class="form-group">
    <label for="networking_mark"> Networking Mark </label>
    <input type="number" id="networking_mark" name="networking_mark" min="0" max="100"  placeholder="Enter Networking mark" value="
    <?php echo ($networking_mark); ?>" >
 </div><br>

 <div class="form-group">
<label for="certificate"> Student Certificate </label>
<input type="file" id="certificate" name="certificate">
</div><br>
        <div class="buttons">
            <button type="submit" class="submit-btn"> Submit and Calculate </button>
            <button type="reset" class="reset-btn"> Reset </button>
        </div>
    </form>


    <?php



    if ($show_result) {

        ?>

        <div class="result-box">

            <h1>
                Student Examination Results
            </h1>


            <table >

                <tr>

                    <th>
                        Student Full Name
                    </th>

                    <td>

                        <?php

                        echo ($student_name);

                        ?>

                    </td>

                </tr>


            

                <tr>

                    <th>
                        Student ID
                    </th>

                    <td>

                        <?php

                        echo ($student_id);

                        ?>

                    </td>

                </tr>



                <tr>

                    <th>
                        Gender
                    </th>

                    <td>

                        <?php

                        echo ($gender);

                        ?>

                    </td>

                </tr>


             

                <tr>

                    <th>
                        Faculty
                    </th>

                    <td>

                        <?php

                        echo ($faculty);

                        ?>

                    </td>

                </tr>



                <tr>

                    <th>
                        PHP Mark
                    </th>

                    <td>

                        <?php

                        echo $php_mark;

                        ?>

                    </td>

                </tr>



                <tr>

                    <th>
                        Database Mark
                    </th>

                    <td>

                        <?php

                        echo $database_mark;

                        ?>

                    </td>

                </tr>


               
                <tr>

                    <th>
                        Networking Mark
                    </th>

                    <td>

                        <?php

                        echo $networking_mark;

                        ?>

                    </td>

                </tr>


          

                <tr>

                    <th>
                        Total Marks
                    </th>

                    <td>

                        <?php

                        echo $total_marks;

                        ?>

                    </td>

                </tr>


              

                <tr>

                    <th>
                        Average Marks
                    </th>

                    <td>

                        <?php

                        echo number_format($average_marks, 2);

                        ?>

                    </td>

                </tr>


           

                <tr>

                    <th>
                        Grade
                    </th>

                    <td>

                        <?php

                        echo $grade;

                        ?>

                    </td>

                </tr>



                <tr>

                    <th>
                        Pass or Fail
                    </th>

                    <td>

                        <?php

                        if ($result == "Pass") {

                            echo '<span class="pass">Pass</span>';

                        } else {

                            echo '<span class="fail">Fail</span>';

                        }

                        ?>

                    </td>

                </tr>


               

                <tr>

                    <th>
                        Certificate Name
                    </th>

                    <td>

                        <?php

                        echo ($certificate_name);

                        ?>

                    </td>

                </tr>


               

                <tr>

                    <th>
                        File Type
                    </th>

                    <td>

                        <?php

                        echo ($file_type);

                        ?>

                    </td>

                </tr>


             

                <tr>

                    <th>
                        File Size
                    </th>

                    <td>

                        <?php

                        echo number_format( $file_size / 1024, 2 );

                        ?>

                        KB

                    </td>

                </tr>


             

                <tr>

                    <th>
                        Upload Status
                    </th>

                    <td class="success">

                        <?php

                        echo ($upload_status);

                        ?>

                    </td>

                </tr>


            </table>

        </div>

        <?php

    }

    ?>


</div>


</body>

</html>