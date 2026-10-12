

Overview

This README contains PHP concepts and code examples from:

- Chapter 3: Function Arguments
- Chapter 4: PHP Forms up to Radio Button Fields

---

Chapter 3 — Function Arguments

1. Function Arguments

Arguments are values passed to a function. Parameters are placeholders that receive those values.

function greet($name) {
    echo "Hello " . $name;
}

greet("Abdirahman");

---

2. Multiple Arguments

A function can accept more than one argument.

function add($a, $b) {
    return $a + $b;
}

echo add(10, 20);

---

3. Returning a Value

The "return" statement sends a value back from a function.

function multiply($a, $b) {
    return $a * $b;
}

$result = multiply(5, 4);

echo $result;

---

4. Returning an Array

A function can return an array containing multiple values.

$array1 = array(9, 2, 7, 5, 1);

function passingArray($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i]++;
    }

    return $arr;
}

$result = passingArray($array1);

foreach ($result as $value) {
    echo $value . ", ";
}

---

5. Passing By Value

Passing by value sends a copy of the variable to the function.

$a = 5;

function changeValue($x) {
    $x = 10;
}

changeValue($a);

echo $a;

The original value remains unchanged.

---

6. Passing By Reference

Passing by reference allows the function to change the original variable.

The "&" symbol is used.

$a = 5;

function changeValue(&$x) {
    $x = 10;
}

changeValue($a);

echo $a;

Output:

10

---

7. Default Argument Value

A default value can be assigned to a parameter.

function welcome($name = "Abdirahman") {
    echo "Welcome " . $name;
}

welcome();

If no argument is provided, the default value is used.

---

Chapter 4 — PHP Forms

1. HTML Form

A form is used to collect information from users.

<form method="post">

    <!-- Form controls -->

</form>

PHP can retrieve submitted form data using superglobals such as "$_POST".

---

2. Textbox

A textbox allows the user to enter text.

<label>Enter Full Name</label>
<input type="text" name="fullName">

PHP:

echo $_POST['fullName'];

---

3. Password Field

A password field is used to enter a password.

<label>Enter Password</label>
<input type="password" name="pinCode">

PHP:

echo $_POST['pinCode'];

---

4. Textarea

A textarea allows the user to enter multiple lines of text.

<textarea
    name="comment"
    cols="30"
    rows="6">
</textarea>

PHP:

echo $_POST['comment'];

---

5. Radio Button Fields

Radio buttons allow the user to select one option from a group.

<form method="post">

    <input type="radio" name="sex" value="male">
    Male

    <input type="radio" name="sex" value="female">
    Female

    <br>

    <input type="submit" name="submit" value="Register">

</form>

PHP:

<?php

if (!empty($_POST['sex'])) {
    echo "Sex: " . $_POST['sex'];
}

?>

Important

Both radio buttons have the same "name":

name="sex"

But they have different values:

value="male"
value="female"

The selected value is retrieved using:

$_POST['sex']

---

Summary

Chapter| Topics
Chapter 3| Function Arguments
Chapter 3| Returning a Value
Chapter 3| Returning an Array
Chapter 3| Passing By Value
Chapter 3| Passing By Reference
Chapter 3| Default Argument Value
Chapter 4| HTML Forms
Chapter 4| Textbox
Chapter 4| Password
Chapter 4| Textarea
Chapter 4| Radio Button Fields
