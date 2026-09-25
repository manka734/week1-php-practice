<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$a = 8;
$b = 12;

$largest = ($a > $b) ? $a : $b;

while (true) {

    if ($largest % $a == 0 && $largest % $b == 0) {
        $lcm = $largest;
        break;
    }

    $largest++;
}

echo "LCM: " . $lcm;

?>
</body>
</html>