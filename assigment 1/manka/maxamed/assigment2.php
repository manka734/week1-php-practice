<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <?php
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
?>
    
</body>
</html>