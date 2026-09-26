<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$numbers = array(5,-7,12,10,-7,11,-6,12,1,-7,2,9);

// Print all elements
echo "All Elements:<br>";

foreach ($numbers as $number) {
    echo $number . " ";
}

echo "<br><br>";

// Total of all elements
$total = array_sum($numbers);
echo "Total of all elements: " . $total . "<br>";

// Total of even elements
$evenTotal = 0;

foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $evenTotal += $number;
    }
}

echo "Total of even elements: " . $evenTotal . "<br>";

// Total of odd elements
$oddTotal = 0;

foreach ($numbers as $number) {
    if ($number % 2 != 0) {
        $oddTotal += $number;
    }
}

echo "Total of odd elements: " . $oddTotal . "<br>";

// Minimum element and its positions
$min = min($numbers);

echo "Minimum element: " . $min . "<br>";
echo "Positions of minimum element: ";

foreach ($numbers as $index => $number) {
    if ($number == $min) {
        echo $index . " ";
    }
}

echo "<br>";

// Maximum element and its positions
$max = max($numbers);

echo "Maximum element: " . $max . "<br>";
echo "Positions of maximum element: ";

foreach ($numbers as $index => $number) {
    if ($number == $max) {
        echo $index . " ";
    }
}

?>
</body>
</html>