<?php
// membuat array asosiatif
$person1 = array(
    "name" => "Alfito",
    "age" => 21,
    "gender" => "male",
);
$person2 = array(
    "name" => "jane",
    "age" => 25,
    "gender" => "female",
);
$person3 = array(
    "name" => "John",
    "age" => 30,
    "gender" => "male",
);


// menampilkan array asosiatif
echo "<p><b>Array Assosiatif</b><hr>";
echo "<pre>";
echo "Person 1 : {$person1['name']},{$person1['age']},{$person1['gender']}<br>";
echo "Person 2 : {$person2['name']},{$person2['age']},{$person2['gender']}<br>";
echo "Person 3 : {$person3['name']},{$person3['age']},{$person3['gender']}<br>";
echo "</p>";
?>