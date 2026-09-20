# PHP Control Structures and Loops

This README explains some important PHP concepts used to control program execution, make decisions, and repeat code.

## Topics Covered

* PHP Constants
* `if...else`
* `switch`
* Ternary Operator
* `for` Loop
* `while` Loop
* `do...while` Loop
* Nested `for` Loops
* Multiplication Table

---

# 1. PHP Constants

A **constant** is a value that cannot be changed after it has been defined.

In PHP, we can create a constant using `define()`.

### Syntax

```php
define("name", value);
```

### Example

```php
define("age", 18);

echo age;
```

### Output

```text
18
```

### Explanation

```php
define("age", 18);
```

This creates a constant called `age` with the value `18`.

```php
echo age;
```

This displays the value of the constant.

Unlike normal variables, constants do not use `$`.

### Variable vs Constant

Variable:

```php
$age = 18;

echo $age;
```

Constant:

```php
define("age", 18);

echo age;
```

---

# 2. If...Else Statement

The `if...else` statement is used when we want the program to make a decision.

### Syntax

```php
if (condition) {
    // code if condition is true
} else {
    // code if condition is false
}
```

### Example

```php
$age = 20;

if ($age >= 10) {
    echo "Adult";
} else {
    echo "Child";
}
```

### Explanation

The variable:

```php
$age = 20;
```

contains the value `20`.

The condition:

```php
$age >= 10
```

asks:

> Is the age greater than or equal to 10?

Because `20 >= 10` is true, PHP executes:

```php
echo "Adult";
```

### Output

```text
Adult
```

---

# 3. Switch Statement

The `switch` statement is useful when we want to compare one value with several possible values.

### Syntax

```php
switch ($value) {

    case value1:
        // code
        break;

    case value2:
        // code
        break;

    default:
        // code
}
```

### Example

```php
$marks = 80;

switch ($marks) {

    case 80:
        echo "Excellent";
        break;

    case 70:
        echo "Very Good";
        break;

    case 60:
        echo "Good";
        break;

    default:
        echo "Try Again";
}
```

### Output

```text
Excellent
```

### How It Works

PHP checks:

```php
case 80:
```

The value of `$marks` is `80`, so this case matches.

Then PHP executes:

```php
echo "Excellent";
```

The `break` stops the switch statement.

### Why use `break`?

Without `break`, PHP can continue executing the following cases.

Example:

```php
case 80:
    echo "Excellent";
    break;
```

The `break` means:

> Stop here.

---

# 4. Ternary Operator

The ternary operator is a short way of writing an `if...else` statement.

It uses:

```text
?
:
```

### Syntax

```php
condition ? value_if_true : value_if_false;
```

### Example

```php
$shidaal = 2.5;

echo $shidaal > 0
    ? "Shidaal wuu ku jiraa"
    : "Shidaal kuma jiro";
```

### Output

```text
Shidaal wuu ku jiraa
```

### Explanation

The condition is:

```php
$shidaal > 0
```

Because `2.5 > 0` is true, PHP displays:

```text
Shidaal wuu ku jiraa
```

If the value was:

```php
$shidaal = 0;
```

The output would be:

```text
Shidaal kuma jiro
```

### Normal If...Else Version

The same code can be written as:

```php
if ($shidaal > 0) {
    echo "Shidaal wuu ku jiraa";
} else {
    echo "Shidaal kuma jiro";
}
```

Ternary makes it shorter.

---

# 5. For Loop

A `for` loop is used when we know how many times we want to repeat something.

### Syntax

```php
for (initialization; condition; increment) {
    // code
}
```

### Example

```php
for ($xisabin = 1; $xisabin <= 5; $xisabin++) {
    echo $xisabin;
}
```

### Output

```text
12345
```

### Explanation

The first part:

```php
$xisabin = 1
```

starts the counter at `1`.

The condition:

```php
$xisabin <= 5
```

means:

> Continue while the counter is less than or equal to 5.

The increment:

```php
$xisabin++
```

increases the value by `1`.

The loop works like this:

```text
1
2
3
4
5
```

---

# 6. For Loop with HTML

PHP can also output HTML.

Example:

```php
for ($counter = 1; $counter <= 12; ++$counter) {
    echo "$counter times<br>";
}
```

### Output

```text
1 times
2 times
3 times
4 times
5 times
...
12 times
```

The:

```html
<br>
```

creates a new line in the browser.

---

# 7. While Loop

A `while` loop repeats code while a condition is true.

### Syntax

```php
while (condition) {
    // code
}
```

### Example

```php
$counter = 1;

while ($counter <= 5) {

    echo $counter;

    $counter++;
}
```

### Output

```text
12345
```

### Explanation

The counter starts at:

```php
$counter = 1;
```

PHP checks:

```php
$counter <= 5
```

If true, it executes the code.

Then:

```php
$counter++;
```

increases the counter.

The process continues until the condition becomes false.

---

# 8. Do...While Loop

A `do...while` loop is similar to a `while` loop.

The important difference is:

> A `do...while` loop executes the code at least once.

### Syntax

```php
do {
    // code
} while (condition);
```

### Example

```php
$i = 1;

do {

    $i++;

    echo $i;

} while ($i <= 5);
```

### Output

```text
23456
```

### Why does it start with 2?

Because the code:

```php
$i++;
```

runs before:

```php
echo $i;
```

So:

```text
1 → 2 → print 2
2 → 3 → print 3
3 → 4 → print 4
4 → 5 → print 5
5 → 6 → print 6
```

---

# 9. Nested Loop

A **nested loop** is a loop inside another loop.

For example:

```php
for ($i = 1; $i <= 10; $i++) {

    for ($j = 1; $j <= 10; $j++) {

        // code

    }
}
```

Here:

* `$i` belongs to the outer loop
* `$j` belongs to the inner loop

The inner loop runs completely for every iteration of the outer loop.

---

# 10. Multiplication Table Using Nested Loops

Example:

```php
for ($i = 1; $i <= 10; $i++) {

    for ($j = 1; $j <= 10; $j++) {

        echo $i * $j . " ";

    }

    echo "<br>";
}
```

This creates a multiplication table from `1 × 1` to `10 × 10`.

### Example Output

```text
1 2 3 4 5 6 7 8 9 10
2 4 6 8 10 12 14 16 18 20
3 6 9 12 15 18 21 24 27 30
...
10 20 30 40 50 60 70 80 90 100
```

---

# 11. Understanding Rows and Columns

Your final code makes the multiplication table easier to understand:

```php
for ($i = 1; $i <= 10; $i++) {

    for ($j = 1; $j <= 10; $j++) {

        echo "Row: $i, Column: $j, Result: " . ($i * $j) . "<br>";

    }
}
```

Here:

```php
$i
```

represents the **row**.

```php
$j
```

represents the **column**.

```php
$i * $j
```

represents the **result**.

### Example

When:

```text
$i = 1
$j = 1
```

the result is:

```text
1 × 1 = 1
```

So PHP prints:

```text
Row: 1, Column: 1, Result: 1
```

When:

```text
$i = 1
$j = 2
```

the result is:

```text
1 × 2 = 2
```

PHP prints:

```text
Row: 1, Column: 2, Result: 2
```

When:

```text
$i = 2
$j = 3
```

the result is:

```text
2 × 3 = 6
```

PHP prints:

```text
Row: 2, Column: 3, Result: 6
```

---

# 12. How Nested Loops Work

Think about the loops like this:

```text
Outer Loop ($i)
│
├── i = 1
│   ├── j = 1
│   ├── j = 2
│   ├── j = 3
│   ├── ...
│   └── j = 10
│
├── i = 2
│   ├── j = 1
│   ├── j = 2
│   ├── j = 3
│   ├── ...
│   └── j = 10
│
├── i = 3
│   └── j = 1 → 10
│
└── ...
```

The inner loop goes from `1` to `10` every time the outer loop changes.

Therefore:

```text
10 outer iterations × 10 inner iterations
= 100 executions
```

---

# 13. Complete Example

```php
<?php

// Constant
define("age", 18);

echo age;

echo "<br><br>";

// If / Else
$myAge = 20;

if ($myAge >= 10) {
    echo "Adult";
} else {
    echo "Child";
}

echo "<br><br>";

// Switch
$marks = 80;

switch ($marks) {

    case 80:
        echo "Excellent";
        break;

    case 70:
        echo "Very Good";
        break;

    case 60:
        echo "Good";
        break;

    default:
        echo "Try Again";
}

echo "<br><br>";

// Ternary Operator
$shidaal = 2.5;

echo $shidaal > 0
    ? "Shidaal wuu ku jiraa"
    : "Shidaal kuma jiro";

echo "<br><br>";

// For Loop
for ($counter = 1; $counter <= 5; $counter++) {
    echo $counter . "<br>";
}

echo "<br>";

// While Loop
$counter = 1;

while ($counter <= 5) {
    echo $counter . "<br>";
    $counter++;
}

echo "<br>";

// Do While Loop
$i = 1;

do {
    $i++;
    echo $i . "<br>";
} while ($i <= 5);

echo "<br>";

// Nested Loop
for ($i = 1; $i <= 10; $i++) {

    for ($j = 1; $j <= 10; $j++) {

        echo "Row: $i, Column: $j, Result: "
            . ($i * $j)
            . "<br>";
    }
}

?>
```

---

# 14. Quick Summary

| Concept      | Purpose                                       |
| ------------ | --------------------------------------------- |
| `define()`   | Creates a constant                            |
| `if`         | Checks a condition                            |
| `else`       | Runs when `if` is false                       |
| `switch`     | Compares one value with multiple cases        |
| `break`      | Stops a loop or switch                        |
| `? :`        | Short form of `if...else`                     |
| `for`        | Repeats code a known number of times          |
| `while`      | Repeats while a condition is true             |
| `do...while` | Executes at least once, then checks condition |
| Nested loop  | A loop inside another loop                    |
| `$i`         | Commonly used as an outer-loop counter        |
| `$j`         | Commonly used as an inner-loop counter        |
| `<br>`       | Creates a new line in HTML                    |

---

# 15. Important Things to Remember

### Constant

```php
define("age", 18);
```

No `$` is used when accessing the constant:

```php
echo age;
```

### If / Else

```php
if (condition) {
    
} else {

}
```

### Switch

```php
switch ($value) {
    case 1:
        // code
        break;

    default:
        // code
}
```

### Ternary

```php
condition ? true : false;
```

### For Loop

```php
for (start; condition; increment) {
    
}
```

### While Loop

```php
while (condition) {
    
}
```

### Do While

```php
do {
    
} while (condition);
```

### Nested Loop

```php
for (...) {

    for (...) {

    }

}
```

---

# Conclusion

PHP control structures allow a program to make decisions and repeat tasks.

The main concepts in this lesson are:

```text
Constants
   ↓
if / else
   ↓
switch
   ↓
ternary operator
   ↓
for loop
   ↓
while loop
   ↓
do...while loop
   ↓
nested loops
   ↓
multiplication table
```

Understanding these concepts is important before moving to more advanced PHP topics such as:

* Arrays
* Functions
* Forms
* Sessions
* Cookies
* MySQL
* CRUD
* Object-Oriented Programming
* Authentication
* PHP + MySQL Projects
