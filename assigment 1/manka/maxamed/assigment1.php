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
$b = 20;
$c = 30;


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






   


?>






      ?> 
</body>
</html>