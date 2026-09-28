<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
// for loop
for ($i = 1; $i <= 5; $i++) {
    echo "$i<br>";
}


// while loop
$i = 1;

while ($i <= 5) {
    echo "$i<br>";
    $i++;
}

// do while loop
$i = 1;

do {
    echo "$i<br>";
    $i++;
} while ($i <= 5);

// break
$i = 1;

while ($i <= 10) {

    echo "$i<br>";

    if ($i == 5) {
        break;
    }

    $i++;
}
// continue

for ($i = 1; $i <= 5; $i++) {

    if ($i == 3) {
        continue;
    }

    echo "$i<br>";
}
//nested loop
    for ($i =1; $i <= 5; $i++)
        for ($j =1; $j <= 5; $j++)
    echo "row is $i, column is $j, " , "reasult is " , ($i * $j) , "<br>";

//numerica indexed array

$fruits = array("Apple", "Orange", "Banana");

echo $fruits[0] . "<br>";
echo $fruits[1] . "<br>";
echo $fruits[2] . "<br>";

// array + for loop

$numbers = array(10, 20, 30, 40);

for ($i = 0; $i < count($numbers); $i++) {

    echo $numbers[$i] . "<br>";

}
// array + for each loop

$numbers = array(10, 20, 30);

foreach ($numbers as $number) {

    echo $number . "<br>";

}
//Associative Array

$student = array(
    "name" => "Abdirahman",
    "age" => 22,
    "city" => "Mogadishu"
);

echo $student["name"] . "<br>";
echo $student["age"] . "<br>";
echo $student["city"];

//Associative Array + Foreach


$student = array(
    "name" => "Abdirahman",
    "age" => 22,
    "city" => "Mogadishu"
);

foreach ($student as $key => $value) {

    echo "$key : $value<br>";

}



?>










</body>
</html>