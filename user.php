<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
   <?php
  echo("hello abdirahman<br>");

// variable
$name = "Abdirahman";
$age = 22;

echo $name."<br>";
echo $age."<br>";


// constant

define("PI", 3.14);

echo PI."<br>";


//if statement
$age = 22;

if ($age >= 18) {
    echo "You are an adult<br>";
}


//if else statement
$marks = 60;

if ($marks >= 50) {
    echo "Pass";
} else {
    echo "Not Pass";
}

echo "<br>";
//if  elseif else statement
$marks = 87;

if ($marks >= 90) {
    echo "Excellent";
}
elseif ($marks >= 80) {
    echo "Very Good";
}
elseif ($marks >= 50) {
    echo "Pass";
}
else {
    echo "Not Pass";
}


echo "<br>";
//switch
$marks = 60;

switch ($marks) {

    case 100:
        echo "Excellent";
        break;

    case 90:
        echo "Very Good";
        break; 

    case 80:
        echo " Good";
        break;

    case 70:
        echo "pass";
        break;

    case 60:
        echo "pass but!!!";
        break;

    default:
        echo "Not Pass";
}

  



   ?> 
</body>
</html>