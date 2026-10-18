<?php

// 1. Declare and initialize the array
$array = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

// 2. Print all elements
echo "<h2>All Elements</h2>";

foreach ($array as $element) {
    echo $element . " ";
}

// 3. Calculate total of all elements
$total = 0;

foreach ($array as $element) {
    $total += $element;
}

echo "<h2>Total of All Elements</h2>";
echo $total;


// 4. Calculate total of even elements
$evenTotal = 0;

foreach ($array as $element) {
    if ($element % 2 == 0) {
        $evenTotal += $element;
    }
}

echo "<h2>Total of Even Elements</h2>";
echo $evenTotal;


// 5. Calculate total of odd elements
$oddTotal = 0;

foreach ($array as $element) {
    if ($element % 2 != 0) {
        $oddTotal += $element;
    }
}

echo "<h2>Total of Odd Elements</h2>";
echo $oddTotal;


// 6. Find minimum element and its positions
$minimum = min($array);

$minimumPositions = [];

foreach ($array as $index => $element) {
    if ($element == $minimum) {
        $minimumPositions[] = $index;
    }
}

echo "<h2>Minimum Element</h2>";
echo "Minimum = " . $minimum . "<br>";

echo "Positions: ";

foreach ($minimumPositions as $position) {
    echo $position . " ";
}


// 7. Find maximum element and its positions
$maximum = max($array);

$maximumPositions = [];

foreach ($array as $index => $element) {
    if ($element == $maximum) {
        $maximumPositions[] = $index;
    }
}

echo "<h2>Maximum Element</h2>";
echo "Maximum = " . $maximum . "<br>";

echo "Positions: ";

foreach ($maximumPositions as $position) {
    echo $position . " ";
}

?>

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

echo "<table border='1' cellpadding='10'>";

echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $rowName => $row) {

    echo "<tr>";

    echo "<th>" . $rowName . "</th>";

    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>

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

echo "<table border='1' cellpadding='10'>";

echo "<tr>";
echo "<th>Student ID</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>" . $id . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";

?>