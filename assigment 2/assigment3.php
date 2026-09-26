<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php

$students = array(

    "CA221" => array(
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0614332211",
        "Address" => "Laba Dhagax, Wardhiigley"
    ),

    "CA223" => array(
        "Name" => "Abdirahman mohamed hersi",
        "Phone" => "0619993800",
        "Address" => "bakaaro, Hodan"
    ),

    "CA2313" => array(
        "Name" => "suheyb axmed nur",
        "Phone" => "0617778899",
        "Address" => "Macmacaanka, Dharkeynley"
    )
);

echo "<table border='1' cellpadding='10'>";

echo "<tr>";
echo "<th>Student ID</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>" . $id . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";

?> 
</body>
</html>