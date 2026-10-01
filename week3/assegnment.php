<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

// 1. Declare an array
$numbers = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

// Initialize variables
$total = 0;
$evenTotal = 0;
$oddTotal = 0;

// 2. Print all elements
echo "Array Elements: ";
print_r($numbers);

// 3, 4, 5. Calculate totals
foreach ($numbers as $number) {

    $total += $number;

    if ($number % 2 == 0) {
        $evenTotal += $number;
    } else {
        $oddTotal += $number;
    }
}

echo "<br>Total: " . $total;
echo "<br>Even Total: " . $evenTotal;
echo "<br>Odd Total: " . $oddTotal;

// 6. Find minimum and its positions
$min = min($numbers);
echo "<br>Minimum: " . $min;
echo "<br>Minimum Positions: ";

foreach ($numbers as $index => $number) {
    if ($number == $min) {
        echo $index . " ";
    }
}

// 7. Find maximum and its positions
$max = max($numbers);
echo "<br>Maximum: " . $max;
echo "<br>Maximum Positions: ";

foreach ($numbers as $index => $number) {
    if ($number == $max) {
        echo $index . " ";
    }
}

?>

<br><br>


<?php

$colors = [
    "Light" => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],

    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],

    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

// Print array as a table
echo "<table border='1' cellpadding='10' style='border-collapse:collapse; text-align:center;'>";

echo "<tr style='background-color:#E2E8F0;'>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $row => $columns) {

    // Assign color to each row
    if ($row == "Light") {
        $rowColor = "#FDE2E2";
    } 
    elseif ($row == "Normal") {
        $rowColor = "#93C5FD";
    } 
    else {
        $rowColor = "#1E3A8A";
    }

    $textColor = ($row == "Dark") ? "white" : "black";

    echo "<tr style='background-color:$rowColor; color:$textColor;'>";

    echo "<th>$row</th>";

    foreach ($columns as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>
<br><br>

<br><br>


<?php

$students = [

    "CA221" => [
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],

    "CA223" => [
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],

    "CA221_2" => [
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]

];

// Print students as a table
echo "<table border='1' cellpadding='10' style='border-collapse:collapse; text-align:center; width:100%;'>";

// Table Header
echo "<tr style='background-color:#1E3A8A; color:white;'>";
echo "<th>Student ID</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

$i = 0;

foreach ($students as $id => $student) {

    // Assign different colors to rows
    if ($i == 0) {
        $rowColor = "#DBEAFE";
    }
    elseif ($i == 1) {
        $rowColor = "#DCFCE7";
    }
    else {
        $rowColor = "#FEF3C7";
    }

    echo "<tr style='background-color:$rowColor; color:#111827;'>";

    // Display original student ID
    $displayID = ($id == "CA221_2") ? "CA221" : $id;

    echo "<td>$displayID</td>";

    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";

    $i++;
}

echo "</table>";

?>
</body>
</html>