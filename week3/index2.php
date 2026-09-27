<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// 1. Greatest and Smallest

$a = 20;
$b = 10;
$c = 30;

$greatest = $a;

if ($b > $greatest) {
    $greatest = $b;
}

if ($c > $greatest) {
    $greatest = $c;
}

$smallest = $a;

if ($b < $smallest) {
    $smallest = $b;
}

if ($c < $smallest) {
    $smallest = $c;
}

echo "Greatest: " . $greatest . "<br>";
echo "Smallest: " . $smallest . "<br><br>";


// 2. Divisible by 3 and 5

$number = 15;

if ($number % 3 == 0 && $number % 5 == 0) {
    echo "The number is divisible by both 3 and 5";
}
elseif ($number % 3 == 0) {
    echo "The number is divisible by 3";
}
elseif ($number % 5 == 0) {
    echo "The number is divisible by 5";
}
else {
    echo "The number is divisible by neither 3 nor 5";
}

echo "<br><br>";


// 3. Odd numbers from 2 to 20

for ($i = 2; $i <= 20; $i++) {

    if ($i % 2 != 0) {
        echo $i . " ";
    }

}

echo "<br><br>";


// 4. Even numbers from 35 to 7

for ($i = 35; $i >= 7; $i--) {

    if ($i % 2 == 0) {
        echo $i . " ";
    }

}

echo "<br><br>";


// 5. Numbers divisible by 2 and 5

for ($i = 50; $i >= 2; $i--) {

    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }

}

echo "<br><br>";


// 6. Reverse number

$number = 12345;
$reverse = 0;

while ($number > 0) {

    $digit = $number % 10;

    $reverse = ($reverse * 10) + $digit;

    $number = intdiv($number, 10);
}

echo "Reverse: " . $reverse;

echo "<br><br>";


// 7. LCM

$a = 8;
$b = 12;

$lcm = $a;

while (true) {

    if ($lcm % $a == 0 && $lcm % $b == 0) {
        break;
    }

    $lcm++;
}

echo "LCM: " . $lcm;

echo "<br><br>";


// 8. HCF

$a = 18;
$b = 24;

$hcf = 1;

for ($i = 1; $i <= $a && $i <= $b; $i++) {

    if ($a % $i == 0 && $b % $i == 0) {
        $hcf = $i;
    }

}

echo "HCF: " . $hcf;

echo "<br><br>";

?>

<?php

echo "<table border='1'>";

echo "<tr>";
echo "<th colspan='17' style='text-align:center;'>multiplication table</th>";
echo "</tr>";

for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {

        echo "<td>" . ($i * $j) . "</td>";

    }

    echo "</tr>";
}

echo "</table>";
echo "<br><br>";

?>

<?php

$num = 7;
$count = 0;

for ($i = 1; $i <= $num; $i++) {

    if ($num % $i == 0) {
        $count++;
    }

    
}



if ($count == 2) {
    echo "$num is prime";
} else {
    echo "$num is non-prime";
}

echo "<br><br>";
?>

<?php

for ($num = 10; $num <= 50; $num++) {

    $count = 0;

    for ($i = 1; $i <= $num; $i++) {

        if ($num % $i == 0) {
            $count++;
        }
    }

    if ($count == 2) {
        echo $num . " ";
    }
}
echo "<br><br>";
?>


 <?php
$info = array("wasac", "abdikadir", "omar", "jusa", 50);

echo "<table border=1>";

echo "<tr>";
echo "<th>  Info about me</th>";
echo "</tr>";

foreach ($info as $names) {
    echo "<tr>";
    echo "<td>$names</td>";
    echo "</tr>";
}

echo "</table>";

?>
    
</body>
</html>