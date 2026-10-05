<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


// MULTI-DIMENSIONAL ARRAYS


$student = array(
    array("Mohamed", 1990, "Hodan", "0608124390"),
    array("Ahmed", 2001, "Yaaqshiid", "0608124391"),
    array("Jaamac", 1986, "Shangaani", "0608124392")
);

foreach ($student as $k) {
    echo "$k[0], $k[1], $k[2], $k[3]<br>";
}

echo "Array elements are:<br>";

foreach ($student as $s) {
    foreach ($s as $v) {
        echo "$v<br>";
    }
}


// ARRAY FUNCTIONS

// is_array()
$info = array(
    "Mohamed",
    "Ahmed",
    "Jaamac",
    21
);

if (is_array($info)) {
    echo "Yes, it is an array";
} else {
    echo "No, it is not an array";
}


// in_array()
if (in_array("21", $info)) {
    echo "<br>Mohamed exists in the array";
} else {
    echo "<br>Mohamed does not exist in the array";
}

if (in_array("Ahmed", $student[1])) {
    echo "Yes, Ahmed exists in the array";
} else {
    echo "No, Ahmed does not exist in the array";
}


// explode()
$a = "The quick brown fox jumps over the lazy dog";
$b = explode(" ", $a);


// shuffle()
shuffle($b);

echo "<pre>";
print_r($b);
echo "</pre>";


// array_merge()
$a1 = array(1, 2, 3);
$a2 = array(1, 5, 6);
$a3 = array_merge($a1, $a2);

echo "<pre>";
print_r($a3);
echo "</pre>";


// array_reverse()
$p = array_reverse($a3);


// array_push()
$a = array(2, 4, 6, 8);
array_push($a, 10);


// array_pop()
$a = array(1, 2, 3, 4);
array_pop($a);


// end()
$last = end($p);
echo "The last element of the array is: " . $last;
echo "<br>";


// Basic function
function writeMsg() {
    echo "Hello world!";
}

writeMsg();


// Function with a parameter
function factorial($a) {
    $result = 1;

    for ($i = 1; $i <= $a; $i++) {
        $result *= $i;
    }

    echo "<br>Factorial of $a is : $result";
}

factorial(5);
?>

</body>
</html>