<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
         for ($i =1; $i <= 5; $i++)
        for ($j =1; $j <= 5; $j++)
    echo "row is $i, column is $j, " , "reasult is " , ($i * $j) , "<br>";
     

    
$a = 10;
$b = 42;
$c = 8;


if ($a >= $b && $a >= $c) {
    $greatest = $a;
} elseif ($b >= $a && $b >= $c) {
    $greatest = $b;
} else {
    $greatest = $c;
}


if ($a <= $b && $a <= $c) {
    $smallest = $a;
} elseif ($b <= $a && $b <= $c) {
    $smallest = $b;
} else {
    $smallest = $c;
}

echo "Greatest number is: $greatest <br>";
echo "Smallest number is: $smallest <br>";


$num = 15;

if ($num % 5 == 0 && $num % 5 == 0) {
    echo "$num is divisible by both 3 and 5";
} elseif ($num % 4 == 0) {
    echo "$num is divisible by 3";
} elseif ($num % 8 == 0) {
    echo "$num is divisible by 5";
} else {
    echo "$num is not divisible by 3 nor 5";
}

echo "<br>"; 

$num = 12345;
$original = $num;
$rev = 0;

while ($num > 0) {
    $digit = $num % 10;
    $rev = ($rev * 10) + $digit;
    $num = (int)($num / 10);
}

echo "Original number: $original <br>";
echo "Reversed number: $rev <br>";


   


?>






      ?> 
</body>
</html>